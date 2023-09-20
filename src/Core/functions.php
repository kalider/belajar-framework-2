<?php

use App\Core\Response;
use App\Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}

/**
 * form filer
 * contoh penggunaan
 * @param $fields array ['_form_name_' => ['_field_in_table_', '_condition_['like', '=']'], ...]
 * 
 * @return array ['where', 'data']
 * 
 * @example 
 * $filter = form_filter([
 *      'nama' => ['nama', 'like'],
 *      'fnbmenucategoryid' => ['fnbmenucategoryid', '='],
 * ]);
 */
function form_filter($fields) {
    $data = [];
    foreach($fields as $key => $_field) {
        $data[$key] = isset($_GET['filters'][$key]) ? $_GET['filters'][$key]: '';
    }

    $response = [
        'data' => $data,
        'action' => array_filter($_GET, function($key){
            return $key != 'filters';
        }, ARRAY_FILTER_USE_KEY),
        'is_filtered' => isset($_GET['filters']),
        'where' => '',
        'params' => []
    ];

    if (!isset($_GET['filters'])) {
        return $response;
    }

    if (!is_array($_GET['filters'])) {
        return $response;
    }

    $filters = [];
    $params = [];
    foreach ($_GET['filters'] as $key => $val) {
        if (!isset($fields[$key])) {
            continue;
        }

        $field = $fields[$key];
        $cond = ":{$field[0]}";

        if ($field[1] == '=' && $val == '') {
            continue;
        }

        if ($field[1] == 'like') {
            $cond = ":{$field[0]}";
            $val = "%{$val}%";
        }

        $filters[] = "AND {$field[0]} {$field[1]} {$cond}";
        $params[$field[0]] = $val;
    }

    if (isset($_GET['cari'])) {
        unset($_GET['cari']);
    }

    $where = implode(' ', $filters);

    return [
        'data' => $data,
        'action' => array_filter($_GET, function($key){
            return $key != 'filters';
        }, ARRAY_FILTER_USE_KEY),
        'is_filtered' => isset($_GET['filters']),
        'where' => $where,
        'params' => $params
    ];
}
<?php

namespace App\Core;

class Paginator
{
    private $limit;
    private $page;
    private $total;

    function __construct($total, $limit = 10)
    {
        $this->total = $total;
        $this->limit = $limit;

        $this->page = isset($_GET['_page']) ? intval($_GET['_page']) : 1;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getOffset() {
        return ($this->page - 1) * $this->limit;
    }

    public function creatLinks($theme = 'bs5')
    {
        $links = 7;
        $last = ceil($this->total / $this->limit);

        $start = (($this->page - $links) > 0) ? $this->page - $links : 1;
        $end = (($this->page + $links) < $last) ? $this->page + $links : $last;

        $nums = [];

        if ($start > 1) {
            $nums[] = [
                'is_active' => false,
                'query' => http_build_query(array_merge($_GET, ['_page' => 1])),
                'title' => '1',
            ];
            $nums[] = [
                'is_active' => false,
                'query' => '',
                'title' => '..',
            ];
        }

        for ($i = $start; $i <= $end; $i++) {
            $nums[] = [
                'is_active' => $this->page == $i,
                'query' => http_build_query(array_merge($_GET, ['_page' => $i])),
                'title' => $i,
            ];
        }

        if ($end < $last) {
            $nums[] = [
                'is_active' => false,
                'query' => '',
                'title' => '..',
            ];
            $nums[] = [
                'is_active' => false,
                'query' => http_build_query(array_merge($_GET, ['_page' => $last])),
                'title' => $last,
            ];
        }

        return view("pagination/{$theme}.view.php", [
            'page' => $this->page,
            'limit' => $this->limit,
            'last' => $last,
            'start' => $start,
            'end' => $end,
            'nums' => $nums,
        ]);
    }
}

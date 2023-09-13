<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/manage') ? 'active':''; ?>" href="/manage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/manage/user') ? 'active':''; ?>" href="/manage/user">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/manage/task') ? 'active':''; ?>" href="/manage/task">Task</a>
                    </li>
                </ul>
                <form class="d-flex" action="/manage/logout" method="post" onsubmit="return confirm('Apakah anda yakin ingin logout?')">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
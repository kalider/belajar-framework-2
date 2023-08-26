<?php require base_path('views/partials/head.php') ?>

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
        <a href="/user/create" class="btn btn-primary">Tambah</a>
    </div>

    <div class="card">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Fatah</td>
                    <td>fatah</td>
                    <td>fatah@kawatama.com</td>
                    <td>Cihanjuang</td>
                    <td>Sukabumi, 03 Desember 1996</td>
                    <td>
                        <span class="badge rounded-pill bg-success">active</span>
                    </td>
                    <td>
                        <a href="/user/edit?id=1" class="btn btn-warning">Edit</a>
                        <a href="/user/delete?id=1" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require base_path('views/partials/footer.php') ?>
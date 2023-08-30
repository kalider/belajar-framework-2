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
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['fullname'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= date('d F Y', strtotime($user['dob'])) ?></td>
                        <td><?= $user['status'] == 1 ? '<span class="badge rounded-pill bg-success">active</span>':'<span class="badge rounded-pill bg-danger">inactive</span>' ?></td>
                        <td>
                            <a href="/user/edit?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/user" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus user ini? User yang dihapus tidak bisa dikembalikan.')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require base_path('views/partials/footer.php') ?>
<?php require base_path('views/manage/partials/head.php') ?>

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/manage">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
        <a href="/manage/user/create" class="btn btn-primary">Tambah</a>
    </div>

    <form action="" method="get">
        <div class="row">
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="fullnameFilterInput" class="form-label">Nama Lengkap</label>
                    <input type="search" class="form-control" id="fullnameFilterInput" name="filters[fullname]" value="<?=$filters['data']['fullname']?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="emailFilterInput" class="form-label">Email</label>
                    <input type="search" class="form-control" id="emailFilterInput" name="filters[email]" value="<?=$filters['data']['email']?>">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="statusFilterInput" class="form-label">Status</label>
                    <select name="filters[status]" id="statusFilterInput" class="form-select">
                        <option value="">- Semua -</option>
                        <option <?=$filters['data']['status'] == 1 ? 'selected': ''?> value="1">Aktif</option>
                        <option <?=$filters['data']['status'] == 0 && $filters['data']['status'] != '' ? 'selected': ''?> value="0">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="statusFilterInput" class="form-label d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card mb-3">
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
                        <td><?= $user['status'] == 1 ? '<span class="badge rounded-pill bg-success">active</span>' : '<span class="badge rounded-pill bg-danger">inactive</span>' ?></td>
                        <td>
                            <a href="/manage/user/edit?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/manage/user" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus user ini? User yang dihapus tidak bisa dikembalikan.')">
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

    <?= $paging->creatLinks() ?>
</div>

<?php require base_path('views/manage/partials/footer.php') ?>
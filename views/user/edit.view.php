<?php require base_path('views/partials/head.php') ?>

<div class="container-fluid mt-3 mb-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/user">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <form action="/user" method="post">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">

                        <div class="mb-3">
                            <label for="fullnameInput" class="form-label">Nama Lengkap</label>
                            <input name="fullname" type="text" class="form-control" id="fullnameInput" placeholder="Nama Lengkap" value="<?= old('fullname', $user['fullname']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="usernameInput" placeholder="Username" value="<?= old('username', $user['username']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="emailInput" placeholder="Email" value="<?= old('email', $user['email']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="addressTexarea" class="form-label">Alamat</label>
                            <textarea name="address" class="form-control" id="addressTexarea" rows="3"><?= old('address', $user['address']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dobInput" class="form-label">Tanggal Lahir</label>
                            <input name="dob" type="date" class="form-control" id="dobInput" placeholder="Tanggal Lahir" value="<?= old('dob', $user['dob']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPasswordInput" class="form-label">Konfirmasi Password</label>
                            <input name="confirm_password" type="password" class="form-control" id="confirmPasswordInput" placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="statusCheckbox" <?= old('status', $user['status']) == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="statusCheckbox">
                                Aktif
                            </label>
                        </div>
                        <div class="text-end mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php') ?>
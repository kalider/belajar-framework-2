<?php require base_path('views/manage/partials/head.php') ?>

<div class="container-fluid mt-3 mb-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/manage">Home</a></li>
                <li class="breadcrumb-item"><a href="/manage/task">Task</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                    <form action="/manage/task" method="post">
                        <div class="mb-3">
                            <label for="userIdSelect" class="form-label">User</label>
                            <select name="user_id" id="userIdSelect" class="form-select">
                                <option value="">.: Pilih User :.</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user['id'] ?>" <?= old('user_id') == $user['id'] ? 'checked': '' ?>><?= $user['fullname'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionText" class="form-label">Task</label>
                            <textarea class="form-control" name="description" id="descriptionText" cols="30" rows="10"><?= old('description') ?></textarea>
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="statusCheckbox" <?= old('status') == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="statusCheckbox">
                                Selesai
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

<?php require base_path('views/manage/partials/footer.php') ?>
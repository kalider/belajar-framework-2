<?php require base_path('views/manage/partials/head.php') ?>

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/manage">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Task</li>
            </ol>
        </nav>
        <a href="/manage/task/create" class="btn btn-primary">Tambah</a>
    </div>

    <div class="card">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><?= $task['user'] ?></td>
                        <td><?= $task['description'] ?></td>
                        <td><?= $task['status'] == 1 ? '<span class="badge rounded-pill bg-success">selesai</span>':'<span class="badge rounded-pill bg-secondary">panding</span>' ?></td>
                        <td>
                            <a href="/manage/task/edit?id=<?= $task['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/manage/task" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus task ini? Task yang dihapus tidak bisa dikembalikan.')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require base_path('views/manage/partials/footer.php') ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['_page' => $page - 1])) ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php foreach ($nums as $num) : ?>
            <?php if ($num['title'] == '..') : ?>
                <li class="page-item disabled">
                    <a class="page-link"><?= $num['title'] ?></a>
                </li>
            <?php else : ?>
                <li class="page-item <?= $num['is_active'] ? 'active' : '' ?>" <?= $num['is_active'] ? 'aria-current="page"' : '' ?>>
                    <?php if ($num['is_active']) : ?>
                        <span class="page-link"><?= $num['title'] ?></span>
                    <?php else : ?>
                        <a class="page-link" href="?<?= $num['query'] ?>"><?= $num['title'] ?></a>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        <li class="page-item <?= $page == $last ? 'disabled' : '' ?>">
            <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['_page' => $page + 1])) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
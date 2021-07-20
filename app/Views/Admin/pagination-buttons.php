<?php $pager->setSurroundCount(2) ?>

<nav class="pagination" aria-label="Page navigation" >
    <?php if ($pager->hasPrevious()) : ?>
        <a class="pagination-previous" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
            <span aria-hidden="true">Anterior</span>
        </a>
    <?php endif ?>

    <?php if ($pager->hasNext()) : ?>
        <a class="pagination-next" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
            <span aria-hidden="true">Siguiente</span>
        </a>
    <?php endif ?>

    <ul class="pagination-list">
        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="pagination-link <?= $link['active'] ? 'is-current' : '' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav> 
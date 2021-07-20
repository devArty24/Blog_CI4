<?= $this->extend('Admin/layout/main')?>

<?= $this->section('title')?>
    Lista de categorias
<?= $this->endSection()?>

<?= $this->section('content')?>
    
    <div class="field">
        <a class="button is-dark" href="<?= base_url(route_to('categories_create'))?>">Agregar nueva categoria</a>
    </div>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category->id?></td>
                    <td><?= $category->name?></td>
                    <td><?= $category->created_at->humanize()?></td>
                    <td><?= $category->updated_at->humanize()?></td>
                    <td>
                        <a href="<?= $category->getLinkEdit()?>">Editar</a> | 
                        <a href="<?= $category->getLinkDelet()?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <?= $pager->links()?>

<?= $this->endSection()?>
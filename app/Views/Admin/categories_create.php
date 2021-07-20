<?= $this->extend('Admin/layout/main')?>

<?= $this->section('title')?>
    Agregar una categoria
<?= $this->endSection()?>

<?= $this->section('content')?>
    <form action="<?= base_url(route_to('categories_store'))?>" method="POST">
        <div class="field">
            <label class="label">Nombre de la categoria</label>
            <div class="control">
                <input class="input" name="name" placeholder="Text input" type="text" value="<?=old('name')?>">
            </div>
            <p class="help is-danger"><?= session('errors.name')?></p>
        </div>

        <div class="field">
            <div class="control">
                <input class="button is-dark" type="submit" value="Guardar">
            </div>
        </div>
    </form>
<?= $this->endSection()?>
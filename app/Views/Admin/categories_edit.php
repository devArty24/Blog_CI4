<?= $this->extend('Admin/layout/main')?>

<?= $this->section('title')?>
    Editar categoria - <?=$category->name?>
<?= $this->endSection()?>

<?= $this->section('content')?>
    <form action="<?= base_url(route_to('categories_updated'))?>" method="POST">
        <div class="field">
            <label class="label">Nombre de la categoria</label>
            <div class="control">
                <input class="input" name="name" placeholder="Text input" type="text" value="<?=old('name') ?? $category->name ?>">
                <input class="input" name="id" placeholder="Text input" type="hidden" value="<?=$category->id?>">
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
<?= $this->extend('Admin/layout/main')?>

<?= $this->section('title')?>
    Lista de articulos
<?= $this->endSection()?>

<?= $this->section('content')?>
    <h1>Listado de aritculos</h1>
    <a href="<?=base_url(route_to('posts_create'))?>">Alta articulos</a>
<?= $this->endSection()?>
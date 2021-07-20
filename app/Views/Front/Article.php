<?=$this->extend('Front/layout/main')?>

<?=$this->section('title')?>
    <?= $post->title?>
<?=$this->endSection()?>

<?=$this->section('content')?>
    <section class="section">
        <div class="content">
            <img alt="" src="<?= $post->getLink()?>" style="width:100%;height:300px;object-fit:cover;">
            <h1><?= $post->title?></h1>
            <h3>Por: <?= $post->author->getFullName()?></h3>
            <p>Fecha: <?= $post->published_at->humanize()?></p>

            <div class="tags are-medium">
                <?php foreach($post->getCategories() as $category):?>
                    <span class="tag"><?= $category->name?></span>
                <?php endforeach;?>
            </div>

            <p><?= $post->body?></p>
        </div>
    </section>
<?=$this->endSection()?>
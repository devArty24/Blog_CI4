<?= $this->extend('Admin/layout/main')?>

<?= $this->section('title')?>
    Crear articulo
<?= $this->endSection()?>

<?= $this->section('content')?>
    <h1>Crear un articulo</h1>
    
    <form action="<?=base_url(route_to('posts_store'))?>" enctype="multipart/form-data" method="POST">
        <div class="columns">
            <div class="column is-four-fifths">
                <div class="field">
                    <label class="label">Titulo</label>
                    <div class="control">
                        <input class="input" name="title" placeholder="Text input" type="text" value="<?=old('title')?>">
                    </div>
                    <p class="help is-danger"><?= session('errors.title')?></p>
                </div>
                <div class="field">
                    <label class="label">Cuerpo</label>
                    <div class="control">
                        <textarea class="textarea" id="body" name="body">
                            <?=old('body')?>
                        </textarea>
                    </div>
                    <p class="help is-danger"><?= session('errors.body')?></p>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <div class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" name="cover" type="file">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">Choose a file...</span>
                            </span>
                            <span class="file-name">Screen shot.png</span>
                        </label>
                    </div>
                    <p class="help is-danger"><?= session('errors.cover')?></p>
                </div>

                <div class="field">
                    <label class="label">Fecha de publicacion</label>
                    <div class="control">
                        <input class="input" name="published_at" type="date" value="<?=old('published_at')?>">
                    </div>
                    <p class="help is-danger"><?= session('errors.published_at')?></p>
                </div>

                <div class="field">
                    <label class="label">Categorias</label>
                    <?php if(empty($categories)): ?>
                        <a href="<?=base_url(route_to('categories_create'))?>">Agregar una categoria</a>
                    <?php else: ?>
                        <?php foreach($categories as $category):?>
                            <div class="field">
                                <label class="checkbox">
                                    <!-- Validate with conditional operator(ternary) -->
                                    <input name="categories[]" type="checkbox" value="<?= $category->id?>"
                                        <?=old('categories.*')
                                                ?
                                                    (in_array($category->id, old('categories.*')) ? 'checked' : '')
                                                : ''
                                        ?>
                                    >
                                    <?= $category->name?>
                                </label>
                            </div>
                        <?php endforeach;?>
                        <p class="help is-danger"><?= session('errors')['categories.*'] ?? ''?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="field">
            <button class="button is-fullwidth is-dark" type="submit">Guardar</button>
        </div>
    </form>
<?= $this->endSection()?>

<?= $this->section('js')?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" crossorigin="anonymous"></script>
    <script>
        tinymce.init({
            selector: '#body',
            height:500,
            menubar:false,
            plugins:['advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatatime media table paste code help wordcount code'
            ],
            toolbar: 'undo redo | formatselect | '+ 
                     'bold italic backcolor | alignleft aligncenter' + 
                     'alignright alignjustify | bullist numlist outdent ident | ' + 
                     'removeformat | help | code', 
            content_style:'body {font-family:Helvetica,Arial,sans-serif; font-size14px}'
        });
    </script>
<?= $this->endSection()?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <?=$this->renderSection('css')?>
        <title><?=$this->renderSection('title')?>&nbsp;-&nbsp;Dashboard</title>
    </head>
    <body>
        <?=$this->include('Admin/layout/header')?>

        <section class="section">
            <div class="container">
                <?php if(session('msg')): ?>
                    <article class="message is-<?= session('msg.type')?>">
                        <div class="message-body">
                            <?= session('msg.body')?>
                        </div>
                    </article>
                <?php endif; ?>
              
                <?=$this->renderSection('content')?>
            </div>
        </section>

        <?=$this->renderSection('js')?>
    </body>
</html>
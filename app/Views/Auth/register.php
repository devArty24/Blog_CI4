<?=$this->extend('Front/layout/main')?>

<?=$this->section('title')?>
    Registro
<?=$this->endSection()?>

<?=$this->section('content')?>
    <section class="section">
        <div class="container">
            <h1>Registrate ahora!</h1>
            <h2  class="subtitle">
                Solo debes ingresar algunos datos para comenzar a publicar
            </h2>
            
            <form action="<?=base_url('auth/store')?>" method="POST">
                <div class="field">
                    <label class="label">Nombre</label>
                    <div class="control">
                        <input class="input" name="name" type="text" placeholder="Text input" value="<?=old('name')?>">
                    </div>
                    <p class="is-danger help"><?= session('errors.name')?></p>
                </div>
                <div class="field">
                    <label class="label">Apellidos</label>
                    <div class="control">
                        <input class="input" name="surname" type="text" placeholder="Text input" value="<?=old('surname')?>">
                    </div>
                    <p class="is-danger help"><?= session('errors.surname')?></p>
                </div>

                <div class="field">
                    <label class="label">Correo</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" name="email" type="email" placeholder="Email input" value="<?=old('email')?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger"><?= session('errors.email')?></p>
                </div>

                <div class="field">
                    <label class="label">Elije tu pais</label>
                    <div class="control">
                        <div class="select">
                            <select name="id_country">
                                <option disabled selected>Elije un pais</option>
                                <?php foreach($countries as $countrie): ?>
                                    <option value="<?=$countrie->id_country?>" <?php if($countrie->id_country == old('id_country')):?> selected <?php endif;?> ><?=$countrie->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <p class="is-danger help"><?= session('errors.id_country')?></p>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contraseña</label>
                    <div class="control">
                        <input class="input" name="password" type="password" placeholder="Text input">
                    </div>
                    <p class="is-danger help"><?= session('errors.password')?></p>
                </div>
                <div class="field">
                    <label class="label">Confirmacion de contraseña</label>
                    <div class="control">
                        <input class="input" name="c-password" type="password" placeholder="Text input">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-info">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?=$this->endSection()?>
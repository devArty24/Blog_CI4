<section class="hero is-info">
    <div class="hero-body">
        <p class="title">Mi Blog personal</p>
        <p class="subtitle">Lista de entradas</p>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
                <li class="<?=service('request')->uri->getPath() == '/' ? 'is-active' : ''?>"><a href="<?=base_url(route_to('home'))?>">Inicio</a></li>
                <li class="<?=service('request')->uri->getPath() == 'auth/registro' ? 'is-active' : ''?>"><a href="<?=base_url(route_to('register'))?>">Registro</a></li>

                <?php if(session()->is_logged): ?>
                    <li><a href="<?=base_url(route_to('posts'))?>">Ir al Dashboards</a></li>
                    <li><a href="<?=base_url(route_to('signout'))?>">Salir</a></li>
                <?php else: ?>
                    <li class="<?=service('request')->uri->getPath() == 'auth/login' ? 'is-active' : '' ?>"><a href="<?=base_url(route_to('login'))?>">Ingreso</a></li>
                <?php endif; ?>
            </ul>
        </div>
        </nav>
    </div>
</section>
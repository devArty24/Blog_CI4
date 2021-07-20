<section class="hero is-dark">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
            <a class="navbar-item">
                Blog con CI4
            </a>
            <span class="navbar-burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
            </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item">
                    <?= session('username')?>
                </a>
                <a class="navbar-item" href="<?=base_url(route_to('signout'))?>">
                    Cerrar Sesion
                </a>
            </div>
            </div>
        </div>
        </nav>
    </div>

    <div class="hero-body">
        <p class="title">Dashboard del blog</p>
        <p class="subtitle">Administa tu blog</p>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
                <li class="<?=service('request')->uri->getPath() == 'admin/articulos' ? 'is-active' : ''?>"><a href="<?=base_url(route_to('posts'))?>">Articulos</a></li>
                <li class="<?= preg_match('|^admin/categorias(\S)*$|', service('request')->uri->getPath(), $matches) ? 'is-active' : ''?>"><a href="<?=base_url(route_to('categories'))?>">Categorias</a></li>
                <!-- <li class="<?=service('request')->uri->getPath() == 'home' ? 'is-active' : '' ?>"><a href="<?=base_url(route_to('login'))?>">Usuarios</a></li> -->
            </ul>
        </div>
        </nav>
    </div>
</section>
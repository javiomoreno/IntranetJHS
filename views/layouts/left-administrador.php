<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menú', 'options' => ['class' => 'header']],
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/administrador/index']],
                    ['label' => 'Usuarios', 'icon' => 'fa fa-users', 'url' => ['/usuario/index']],
                    ['label' => 'Salir', 'icon' => 'fa fa-power-off', 'url' => ['/site/logout'], 'options' => ['data-method' => 'post']],
                ],
            ]
        ) ?>

    </section>

</aside>

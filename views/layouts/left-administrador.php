<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../imagenes/avatar-none.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= app\models\Usuario::findIdentity(\Yii::$app->user->getId())->UsuarioNombre;?></p>

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
                    ['label' => 'Roles', 'icon' => 'fa fa-user-secret', 'url' => ['/rol/index']],
                    ['label' => 'Empresas', 'icon' => 'fa fa-sitemap', 'url' => ['/empresa/index']],
                    ['label' => 'Cargos', 'icon' => 'fa fa-black-tie', 'url' => ['/cargo/index']],
                ],
            ]
        ) ?>

    </section>

</aside>

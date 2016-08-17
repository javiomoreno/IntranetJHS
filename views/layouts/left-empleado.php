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
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/empleado/index']],
                    ['label' => 'La Empresa', 'icon' => 'fa fa-industry', 'url' => ['/empleado/la-empresa']],
                    ['label' => 'Misión y Visión', 'icon' => 'fa fa-eye', 'url' => ['/empleado/mision-vision']],
                    ['label' => 'Valores', 'icon' => 'fa  fa-male', 'url' => ['/empleado/valores']],
                    ['label' => 'Recursos Humanos', 'icon' => 'fa fa-sitemap', 'url' => ['/empleado/recursos-humanos']],
                    ['label' => 'Consultar Recibos', 'icon' => 'fa fa-clone', 'url' => ['/empleado/consultar-recibos']],
                    ['label' => 'Solicitudes', 'icon' => 'fa fa-file-text', 'url' => ['/empleado/solicitudes']],
                ],
            ]
        ) ?>

    </section>

</aside>

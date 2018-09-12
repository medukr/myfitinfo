<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.08.18
 * Time: 15:50
 */
use yii\helpers\Url;
use app\controllers\AppController;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->profile->getImage() ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->user_name ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Навигация</li>
            <li class="<?= AppController::isSidebarActive('user', 'index')?>">
                <a href="<?= Url::to(['user/index'])?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Пользователи</span>
<!--                    <span class="pull-right-container">-->
<!--                        <span class="label label-primary pull-right">4</span>-->
<!--                    </span>-->
                </a>
            </li>
            <li class="<?= AppController::isSidebarActive('profile', 'index')?>">
                <a href="<?= Url::to(['profile/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Профили</span>
                </a>
            </li>
            <li class="<?= AppController::isSidebarActive('discipline', 'index')?>">
                <a href="<?= Url::to(['discipline/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Упражнения</span>
                </a>
            </li>
            <li class="<?= AppController::isSidebarActive('preset', 'index')?>">
                <a href="<?= Url::to(['preset/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Программы</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

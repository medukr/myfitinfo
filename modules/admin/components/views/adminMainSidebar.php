<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.08.18
 * Time: 15:50
 */
use yii\helpers\Url;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adm/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Навигация</li>
            <li class="active">
                <a href="<?= Url::to(['user/index'])?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Пользователи</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?= Url::to(['profile/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Профили</span>
                </a>
            </li>
            <li class="">
                <a href="<?= Url::to(['discipline/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Дисциплины</span>
                </a>
            </li>
            <li class="">
                <a href="<?= Url::to(['preset/index']) ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Программы</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

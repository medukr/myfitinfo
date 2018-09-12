<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.08.18
 * Time: 16:10
 */
use yii\helpers\Url;
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= Url::to(['default/index']) ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>KA</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>KA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </nav>
</header>

<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 24.07.18
 * Time: 17:03
 */
?>
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <i class="material-icons d-inline-block align-top mr-1" d="main-logo" style="max-width: 25px;">sentiment_very_satisfied</i>
<!--                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">-->
                    <span class="d-none d-md-inline ml-1">MyFitInfo</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
<!--    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">-->
<!--        <div class="input-group input-group-seamless ml-3">-->
<!--            <div class="input-group-prepend">-->
<!--                <div class="input-group-text">-->
<!--                    <i class="fas fa-search"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>-->
<!--    </form>-->
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link<?= (Yii::$app->controller->action->id == 'index') ? ' active' : ''?>" href="/">
                    <i class="material-icons">trending_up</i>
                    <span>Статистика</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/start">
                    <i class="material-icons">play_circle_filled</i>
                    <span>Начать тренировку</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/chart">
                    <i class="material-icons">bar_chart</i>
                    <span>Замеры</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/program">
                    <i class="material-icons">assignment</i>
                    <span>Программа</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/journal">
                    <i class="material-icons">list_alt</i>
                    <span>Журнал</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/discipline">
                    <i class="material-icons">fitness_center</i>
                    <span>База упражнений</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/profile">
                    <i class="material-icons">person</i>
                    <span>Профиль</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

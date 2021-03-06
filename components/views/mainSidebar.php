<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 24.07.18
 * Time: 17:03
 */
use app\controllers\AppController;
use yii\helpers\Url;
?>
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="/" style="line-height: 25px;">
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
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'index')?>" href="<?= Url::home() ?>">
                    <i class="material-icons">trending_up</i>
                    <span>Статистика</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'start')?>" href="<?= Url::to(['home/start']) ?>">
                    <i class="material-icons">play_circle_filled</i>
                    <span>Начать тренировку</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'chart')?>" href="<?= Url::to(['home/chart']) ?>">
                    <i class="material-icons">bar_chart</i>
                    <span>Замеры</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'program')?>" href="<?= Url::to(['home/program']) ?>">
                    <i class="material-icons">assignment</i>
                    <span>Программы</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'journal')?>" href="<?= Url::to(['home/journal']) ?>">
                    <i class="material-icons">list_alt</i>
                    <span>Журнал</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= AppController::isSidebarActive('home', 'discipline')?>" href="<?= Url::to(['home/discipline']) ?>">
                    <i class="material-icons">fitness_center</i>
                    <span>База упражнений</span>
                </a>
            </li>
            <li class="nav-item<?= AppController::isSidebarActive('home', 'profile')?>">
                <a class="nav-link " href="<?= Url::to(['profile/update']) ?>">
                    <i class="material-icons">person</i>
                    <span>Профиль</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 24.07.18
 * Time: 17:26
 */
use yii\helpers\Url;
use app\models\User;
?>
<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <ul class="navbar-nav border-left flex-row">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?= $profile->getImage() ?>" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?= Yii::$app->user->identity->user_name ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <?php if (Yii::$app->user->identity->getIsAdmin() === User::IS_ADMIN): ?>
                        <a class="dropdown-item" href="<?= Url::to([Yii::$app->params['adminUrl'].'/default/index']) ?>">
                            <i class="material-icons">&#xE7FD;</i> АдминКа</a>
                        <div class="dropdown-divider"></div>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?= Url::to(['profile/update']) ?>">
                        <i class="material-icons">&#xE7FD;</i> Профиль</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= Url::to(['site/logout']) ?>">
                        <i class="material-icons text-danger">&#xE879;</i> Выход</a>
                </div>
            </li>
        </ul>
        <nav class="nav">
            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>
<!-- / .main-navbar -->

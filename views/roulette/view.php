<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 06.08.18
 * Time: 12:00
 */
?>

<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <?= \app\components\FlashMessageWidget::widget() ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Мои измерения</span>
                <h3 class="page-title"><?= $roulette->name ?></h3>
            </div>
        </div>
        <!-- End Page Header -->
        <h3>Более детальный график</h3>
    </div>
</main>
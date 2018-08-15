<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 14.08.18
 * Time: 14:58
 */?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Статистика</span>
                <h3 class="page-title">Моя Статистика</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?php foreach ($sets as $set): ?>

        <?php endforeach; ?>
    </div>
</main>

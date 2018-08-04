<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 25.07.18
 * Time: 10:39
 */
use yii\helpers\Url;
?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Start</span>
                <h3 class="page-title">Выбор программы</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?php foreach ($presets as $preset): ?>
        <div class="row">
            <div class="col-lg col-sm-12 mb-2 p-0">
                <a href="<?= Url::to(['set/start', 'id' => $preset->id]) ?>" class="card card-small card-post card-post--aside card-post--1">
                    <div class="card-body d-flex pl-2 pt-2 pb-2">
                        <div class="col-lg p-0">
                            <h5 class="card-title">
                                <span class="text-fiord-blue flex-column d-flex" ><?= $preset->name ?></span>
                            </h5>
                            <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время, что-нибуть, норм смотрится</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

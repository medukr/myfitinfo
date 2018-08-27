<?php
/* @var $this yii\web\View */

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
                <span class="text-uppercase page-subtitle">Моя статистика</span>
                <h3 class="page-title">Всего тренировок</h3>
                <h3 class="page-title"><?= $count_sets ?></h3>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="page-header row no-gutters pb-3">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Статистика по программам</span>
            </div>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($data as $set): ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-2 pl-1 pr-1">
                    <div class="stats-small stats-small--1 card card-small">
                        <div class="card-body p-0 d-flex">
                            <div href="" class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                    <span class="stats-small__label text-uppercase"><?= $set['name'] ?></span>
                                    <h6 class="stats-small__value count my-3"><?= $set['last_result']?> кг</h6>
                                </div>
                                <div class="stats-small__data">
                                    <?php if ($set['last_result'] >= $set['prelast_result'] ): ?>
                                    <span class="stats-small__percentage stats-small__percentage--increase">+<?= $set['last_result'] - $set['prelast_result']?></span>
                                    <?php else: ?>
                                        <span class="stats-small__percentage stats-small__percentage--decrease">-<?= $set['prelast_result'] - $set['last_result']?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <canvas height="70" class="blog-overview-stats-small-<?= $i++ ?>"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?= \app\components\StatsChartWidget::widget(['data' => $data]) ?>
    </div>
</main>

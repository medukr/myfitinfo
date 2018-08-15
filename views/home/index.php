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
                        <h3 class="page-title">0</h3>
                    </div>
                </div>
                <!-- End Page Header -->


                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Статистика по программам</span>
                    </div>
                </div>

                <?php $i = 0; ?>
                <?php foreach ($sets as $set): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-2 pl-1 pr-1">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <a href="<?= Url::to(['stats/view', 'name' => $set->name]) ?>" class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase"><?= $set->name ?></span>
                                        <h6 class="stats-small__value count my-3">0</h6>
                                    </div>
                                    <div class="stats-small__data">
                                        <span class="stats-small__percentage stats-small__percentage--increase">Нет замеров</span>
                                    </div>
                                </a>
                                <canvas height="70" class="blog-overview-stats-small-<?= $i++ ?>"></canvas>
                                <div class="row m-2">
                                    <a href="" class="nav-link-icon" data-toggle="modal"
                                       data-target="#addRouletteDataModal-ID"><i class="material-icons">edit</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>



                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Выполненные упражнения</span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-2 pl-1 pr-1">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <a href="<?= Url::to(['stats/view']) ?>" class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase">Name</span>
                                        <h6 class="stats-small__value count my-3">0</h6>
                                    </div>
                                    <div class="stats-small__data">
                                        <span class="stats-small__percentage stats-small__percentage--increase">Нет замеров</span>
                                    </div>
                                </a>
                                <canvas height="70" class="blog-overview-stats-small-1"></canvas>
                                <div class="row m-2">
                                    <a href="" class="nav-link-icon" data-toggle="modal"
                                       data-target="#addRouletteDataModal-ID"><i class="material-icons">edit</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>

<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 25.07.18
 * Time: 10:39
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
                <span class="text-uppercase page-subtitle">База упражнений</span>
                <h3 class="page-title">База упражнений</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Small Stats Blocks -->
        <?php foreach ($disciplines as $discipline): ?>
        <div class="row">
            <div class="col-lg col-sm-12 mb-2 p-0">
                <div class="card card-small card-post card-post--aside card-post--1">
                    <div class="card-post__image" style="background-image: url('<?= $discipline->getImage()?>');">
                    </div>
                    <div class="card-body d-flex pl-2 pt-2 pb-2">
                        <div class="col-lg p-0">
                        <h5 class="card-title">
                            <span class="text-fiord-blue flex-column d-flex" ><?= $discipline->name ?></span>
                        </h5>
                            <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время, что-нибуть, норм смотрится</p>
                        </div>
                        <div class="row ml-auto">
                        <a href="" class="nav-link-icon mr-2 ml-auto" data-toggle="modal" data-target="#itemInfoModal<?= $discipline->id?>"><i class="material-icons">info</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= \app\components\ModalDisciplineInfoWidget::widget(compact('discipline')) ?>
        <?php endforeach; ?>

<!--        <div class="row">-->
<!--            <div class="col-lg col-sm-12 mb-4">-->
<!--                <div class="card card-small card-post card-post--aside card-post--1">-->
<!--                    <div class="card-post__image" style="background-image: url('images/content-management/5.jpeg');">-->
<!--                        <a href="#" class="card-post__category badge badge-pill badge-info">Travel</a>-->
<!--                        <div class="card-post__author d-flex">-->
<!--                            <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('images/avatars/0.jpg');">Written by Anna Ken</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">-->
<!--                            <a class="text-fiord-blue" href="#">Attention he extremity unwilling on otherwise cars backwards yet</a>-->
<!--                        </h5>-->
<!--                        <p class="card-text d-inline-block mb-3">Conviction up partiality as delightful is discovered. Yet jennings resolved disposed exertion you off. Left did fond drew fat head poor jet pan flying over...</p>-->
<!--                        <span class="text-muted">29 February 2019</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</main>

<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 25.07.18
 * Time: 10:39
 */
use yii\helpers\Html;
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
                <span class="text-uppercase page-subtitle">База упражнений</span>
                <h3 class="page-title">База упражнений</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Small Stats Blocks -->
        <?php if ($disciplines): ?>
        <?php foreach ($disciplines as $discipline): ?>
        <div class="row">
            <div class="col-lg col-sm-12 mb-2 px-0 ">
                <div class="card card-small card-post card-post--aside card-post--1">
                    <div class="card-post__image" style="background-image: url('<?= $discipline->getImage()?>');">
                    </div>
                    <div class="card-body d-flex py-2">
                        <div class="col-lg p-0">
                        <h5 class="card-title">
                            <span class="text-fiord-blue flex-column d-flex" ><?= $discipline->name ?></span>
                        </h5>
<!--                            <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время и т.д.</p>-->
                        </div>
                        <form>
                            <div class="row ml-auto">
                                <?= Html::button('<i class="material-icons">info</i>',
                                    [
                                        'class' => 'nav-link-icon mr-2 mb-2 p-1 ml-auto btn',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#itemInfoModal' . $discipline->id,
                                    ]) ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?= \app\components\ModalDisciplineInfoWidget::widget(compact('discipline')) ?>
        <?php endforeach; ?>
        <?php else: ?>
        <h5>Нет упражнений, и это печально...</h5>
        <?php endif; ?>
    </div>
</main>

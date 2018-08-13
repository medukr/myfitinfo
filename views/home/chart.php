<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 06.08.18
 * Time: 10:00
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-info mx-2"></i>
        <strong><?php echo Yii::$app->session->getFlash('success');?></strong>

        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Success!</strong> Your profile has been updated! </div>
    </div>
    <?php endif; ?>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Замеры</span>
                <h3 class="page-title">Мои измерения</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?php if ($roulettes): ?>
        <?php $i = 1; ?>
            <?php foreach ($roulettes as $roulette): ?>
                <div class="row" >
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-2 pl-1 pr-1">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <a href="<?= Url::to(['roulette/view', 'id' => $roulette->id]) ?>" class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase"><?= $roulette->name ?></span>
                                        <h6 class="stats-small__value count my-3"><?= $roulette->getLastData() ?></h6>
                                    </div>
                                    <div class="stats-small__data">
                                        <?= $roulette->getDifferenceOfLast() ?>
                                    </div>
                                </a>
                                <canvas height="70" class="blog-overview-stats-small-<?= $i++ ?>"></canvas>
                                <div class="row m-2">
                                    <a href="" class="nav-link-icon" data-toggle="modal" data-target="#addRouletteDataModal-<?= $roulette->id ?>"><i class="material-icons">edit</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add addRouletteData Modal -->
                <div class="modal fade" id="addRouletteDataModal-<?= $roulette->id ?>" tabindex="-1" role="dialog" aria-labelledby="addRouletteDataTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRouletteDataTitle">Добавить показзания</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $form = ActiveForm::begin(['action' => Url::to('/roulette/add-data'), 'method' => 'post']); ?>
                            <div class="modal-body">
                                <?= $form->field($data_model, 'measurement')->textInput(['maxlength' => true]) ?>
                                <?= $form->field($roulette, 'id')->hiddenInput()->label(false) ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <?= Html::submitButton('Добавить',
                                    [
                                            'class' => 'btn btn-primary',
                                    ]) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <!-- end addRouletteData modal -->
            <?php endforeach; ?>
            <?= \app\components\ChartDataWidget::widget(['roulettes' => $roulettes]) ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg col-sm-12 mb-4 p-0">
                <a href="" class="card card-small card-post card-post--aside card-post--1" data-toggle="modal"
                   data-target="#addChartModal">
                    <div class="card-body d-flex">
                        <h5 class="card-title">
                            <span class="text-fiord-blue flex-column d-flex">Добавить</span>
                        </h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

<!-- Add Chart Modal -->
<div class="modal fade" id="addChartModal" tabindex="-1" role="dialog" aria-labelledby="addChartModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addChartModalTitle">Дабавить измерение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin(['action' => Url::to(['/roulette/add']), 'method' => 'post']); ?>
            <div class="modal-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Добавить',
                    [
                            'class' => 'btn btn-primary'
                    ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- end add chart modal -->



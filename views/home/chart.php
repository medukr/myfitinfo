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
    <div class="main-content-container container-fluid px-3">
        <?= \app\components\FlashMessageWidget::widget() ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Замеры</span>
                <h3 class="page-title">Мои графики</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?php if ($roulettes): ?>
            <?php $i = 1; ?>
            <?php $k = 1; ?>
            <?php foreach ($roulettes as $roulette): ?>
                <?php if ($k % 2 != 0): ?>
                    <div class="row" >
                <?php endif; ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-2 px-1">
                        <div class="stats-small stats-small--1 card card-small">


                            <div class="card-body d-flex pt-3 pb-0">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase"><?= $roulette->name ?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body d-flex">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <h6 class="stats-small__value count my-0"><?= $roulette->getLastData() ?><?= Html::a('<i class="material-icons">edit</i>',
                                                    '',
                                                    [
                                                        'class' => 'nav-link-icon mr-2',
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#addRouletteDataModal-' . $roulette->id,
                                                    ]) ?>
                                            </h6>
                                    </div>
                                </div>
                            </div>



                            <div class="card-body d-flex pt-0 pb-3">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data">
                                        <?= $roulette->getDifferenceOfLast() ?>
                                    </div>
                                </div>
                            </div>


                            <canvas height="70" class="blog-overview-stats-small-<?= $i++ ?>"></canvas>
                        </div>
                    </div>
                        <!-- Add addRouletteData Modal -->
                        <div class="modal fade" id="addRouletteDataModal-<?= $roulette->id ?>" tabindex="-1" role="dialog" aria-labelledby="addRouletteDataTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addRouletteDataTitle">Изменить показание</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php $formDeleteLast = ActiveForm::begin(['action' => Url::to('/roulette/delete-last-data'), 'method' => 'post']); ?>
                                    <?= $formDeleteLast->field($roulette, 'id',
                                        [
                                                'options' => [
                                                        'class' => '',
                                                ]
                                        ])->hiddenInput()->label(false) ?>
                                    <?php ActiveForm::end(); ?>
                                    <?php $formDelete = ActiveForm::begin(['action' => Url::to(['/roulette/delete-roulette']), 'method' => 'post']); ?>
                                    <?= $formDelete->field($roulette, 'id',
                                        [
                                            'options' => [
                                                'class' => '',
                                            ]
                                        ])->hiddenInput()->label(false) ?>
                                    <?php ActiveForm::end() ?>
                                    <div class="modal-body">
                                        <?php $form = ActiveForm::begin(['action' => Url::to('/roulette/add-data'), 'method' => 'post']); ?>
                                        <?= $form->field($data_model, 'measurement')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($roulette, 'id',
                                            [
                                                'options' => [
                                                    'class' => '',
                                                ]
                                            ])->hiddenInput()->label(false) ?>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                                <?= Html::submitButton('<i class="fa fa-plus"></i> ДОБАВИТЬ',
                                                    [
                                                        'class' => 'btn btn-pill btn-primary  m-2 mr-auto font-weight-bold',
                                                        'form' => $form->id,
                                                    ]) ?>
                                                <button type="button" class="btn btn-pill btn-secondary ml-auto m-2 font-weight-bold" data-dismiss="modal">ОТМЕНА</button>
                                            <?= Html::submitButton('Удалить посленее значение',
                                                [
                                                    'class' => 'btn btn-pill mx-auto m-2 font-weight-bold',
                                                    'form' => $formDeleteLast->id,
                                                ]) ?>
                                            <?= Html::submitButton('Удалить график',
                                                [
                                                    'class' => 'btn btn-pill btn-danger mx-auto m-2 font-weight-bold',
                                                    'form' => $formDelete->id,
                                                    'onclick' => 'if(!confirm("Вы уверены, что хотите удалить этот график? Это действие необратимо.")) return false',

                                                ]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end addRouletteData modal -->
                <?php if ($k % 2 == 0 || $k == count($roulettes)): ?>
                    </div>
                <?php endif; ?>
                <?php $k++ ?>
            <?php endforeach; ?>
            <?= \app\components\ChartDataWidget::widget(['roulettes' => $roulettes]) ?>
        <?php else: ?>
        <h5>Добавь свой первый график. Например, вес :)</h5>
        <?php endif; ?>
        <div class="row align-content-center">
            <div class="col-lg col-sm-12 mb-4 px-1">
                <a href="" class="card card-small card-post card-post--aside card-post--1" data-toggle="modal"
                   data-target="#addChartModal">
                    <div class="card-body d-flex ">
                        <h5 class="card-title">
                            <span class="text-fiord-blue flex-column d-flex ">Добавить</span>
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
                <h5 class="modal-title" id="addChartModalTitle">Добавить график</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin(['action' => Url::to(['/roulette/add']), 'method' => 'post']); ?>
            <div class="modal-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-pill btn-secondary font-weight-bold" data-dismiss="modal">ОТМЕНА</button>
                <?= Html::submitButton('<i class="fa fa-plus"></i> ДОБАВИТЬ',
                    [
                            'class' => 'btn btn-pill btn-primary font-weight-bold'
                    ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- end add chart modal -->



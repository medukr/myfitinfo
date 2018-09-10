<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 30.07.18
 * Time: 10:08
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
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Программы</span>
                <h3 class="page-title">Список моих программ</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="presets">
            <?= \app\components\FlashMessageWidget::widget() ?>
            <?= \app\components\PresetsListWidget::widget(['presets' => $presets]) ?>
        </div>
        <div class="row">
            <div class="col-lg col-sm-12 mb-4 p-0">
                <a href="" class="card card-small card-post card-post--aside card-post--1" data-toggle="modal" data-target="#addPresetModal">
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

<!-- Add Preset Modal -->
<div class="modal fade" id="addPresetModal" tabindex="-1" role="dialog" aria-labelledby="addPresetModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Назовите новую программу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin(['action' => Url::to(['/preset/add']), 'method' => 'post']); ?>
            <div class="modal-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-pill btn-secondary  font-weight-bold" data-dismiss="modal">ОТМЕНА</button>
                <?= Html::submitButton('<i class="fa fa-plus"></i> ДОБАВИТЬ',
                    [
                            'class' => 'btn btn-pill btn-primary  font-weight-bold'
                    ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- end add preset modal -->

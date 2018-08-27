<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 30.07.18
 * Time: 11:11
 */

use \yii\widgets\ActiveForm;
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
        <?= \app\components\FlashMessageWidget::widget() ?>
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Прораммы</span>
                <h3 class="page-title">Изменить программу</h3>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-sm-12 col-md-12">
                    <strong class="text-muted d-block mb-2">Название программы</strong>
                    <div class="row ml-auto" id="edit-name">
                        <?php $form = ActiveForm::begin(['action' => Url::to('/preset/update-name')]); ?>
                        <?= Html::hiddenInput('Presets[id]', $preset->id) ?>
                        <div class="input-group">
                            <?= Html::input('text', 'Presets[name]', $preset->name, ['class' => 'form-control input-lg']) ?>
                            <div class="input-group-append">
                                <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                    <strong class="text-muted d-block mb-2">Добавить упражнение</strong>
                <?php $form = ActiveForm::begin([
                        'action' => Url::to(['/preset/add-item']),
                        'method' => 'post'
                ]) ?>
                    <div class="input-group mb-4">
                        <?= $form->field($preset, 'id')->hiddenInput(['name' => 'PresetsDisciplines[preset_id]'])->label(false) ?>
                        <select id="inputState" class="form-control custom-select-lg" name="PresetsDisciplines[discipline_id]">
                            <?php foreach ($disciplines as $discipline): ?>
                                <option value="<?= $discipline->id ?>"><?= Html::decode($discipline->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <?= Html::submitButton('Добавить',
                                [
                                    'class' => 'btn btn-primary',
                                    'name' => 'submit',
                                    'id' => 'add-to-preset',
                                    'value' => 1,
                                    'data-form-id' => $form->id
                                ]) ?>
                        </div>


                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
        <div id="preset-items">
            <?= \app\components\PresetItemsListWidget::widget(['preset' => $preset]) ?>
        </div>
</main>

<!-- Modal Edit Name-->
<div class="modal fade" id="editName" tabindex="-1" role="dialog" aria-labelledby="editNameTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNameTitle">Изменить назваине</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <?php $form = ActiveForm::begin(['action' => Url::to('/preset/update-name')]); ?>
                <div class="modal-body">
                    <?= $form->field($preset, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($preset, 'id')->hiddenInput()->label(false) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Отмена</button>
                    <?= Html::submitButton('Изменить', ['class' => 'btn btn-lg btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--end modal edit name-->

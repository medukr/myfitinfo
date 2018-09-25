<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 26.07.18
 * Time: 15:37
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php foreach ($preset->presetsDisciplines as $presetsDisciplines): ?>
<?php $discipline = $presetsDisciplines->disciplines ?>
    <div class="row" id="discipline-list">
        <div class="col-lg col-sm-12 mb-2 p-0">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-post__image" style="background-image: url('<?= $discipline->getImage() ?>');"></div>
                <div class="card-body d-flex py-2">
                    <div class="col-lg p-0">
                        <h5 class="card-title">
                            <span class="text-fiord-blue flex-column d-flex"><?= $discipline->name ?></span>
                        </h5>
<!--                        <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время и т.д.</p>-->
                    </div>
                    <?php $form = ActiveForm::begin(['action' => Url::to(['/preset/delete-item']), 'method' => 'delete']) ?>
                    <?= Html::hiddenInput('PresetsDisciplines[discipline_id]', $discipline->id) ?>
                    <?= Html::hiddenInput('PresetsDisciplines[preset_id]', $preset->id) ?>
                    <div class="row ml-auto">
                        <?= Html::button('<i class="material-icons">info</i>',
                            [
                                'class' => 'nav-link-icon mr-2 mb-2 p-1 ml-auto btn',
                                'data-toggle' => 'modal',
                                'data-target' => '#itemInfoModal' . $discipline->id,
                            ]) ?>
                        <?= Html::submitButton('<i class="material-icons">delete</i>',
                            [
                                'class' => 'nav-link-icon mr-2 mb-2 p-1 ml-auto delete-preset-item btn',
                                'data-form-id' => $form->id,
                                'name' => 'submit',
                                'value' => 1,
                            ]) ?>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
    <?= \app\components\ModalDisciplineInfoWidget::widget(compact('discipline')) ?>
<?php endforeach; ?>

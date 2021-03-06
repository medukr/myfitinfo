<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 10:58
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\PresetsListWidget;

?>
<?php if ($presets): ?>
<?php foreach ($presets as $preset): ?>
    <div class="row" id="preset-<?= $preset->id ?>">
        <div class="col-lg col-sm-12 mb-2 p-0">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body d-flex pl-2 pt-2 pb-2">
                    <div class="col-lg p-0">
                        <h5 class="card-title">
                            <?= $preset->name ?>
                        </h5>
<!--                        <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время и т.д.</p>-->
                        <?php if   ($preset->discipline): ?>

                        <span class="badge badge-info dropdown-toggle" data-toggle="collapse" data-target="#collapseDiscipline<?= $preset->id ?>" aria-expanded="false" aria-controls="collapseDiscipline<?= $preset->id ?>">
                            Подробнее
                        </span>

                        <div class="collapse" id="collapseDiscipline<?= $preset->id ?>">
                            <?php foreach ($preset->discipline as $discipline): ?>
                                <p class="card-text text-muted mb-0"><?= $discipline->name ?></p>
                            <?php endforeach; ?>

                            <span class="badge badge-secondary" data-toggle="collapse" data-target="#collapseDiscipline<?= $preset->id ?>" aria-expanded="false" aria-controls="collapseDiscipline<?= $preset->id ?>">
                            Скрыть
                        </span>
                        </div>

                        <?php else: ?>
                             <p class="card-text text-muted mb-0">Нет упражнений</p>
                        <?php endif; ?>
                    </div>

                    <?php if ($purpose == PresetsListWidget::PURPOSE_EDIT): ?>

                        <?php if ($preset->user_id === Yii::$app->user->id): ?>
                            <?php $form = ActiveForm::begin(['action' => Url::to(['/preset/delete']), 'method' => 'delete']) ?>
                            <?= Html::hiddenInput('Presets[id]', $preset->id)?>
                            <div class="row ml-auto">
                            <?= Html::a(
                                Html::button('<i class="material-icons">edit</i>',
                                    [
                                        'class' => 'nav-link-icon mr-2 mb-2 p-1 btn'
                                    ]),
                                Url::to(['/preset/edit', 'id' => $preset->id]),
                                [
                                        'class' => 'ml-auto'
                                ]
                            ) ?>
                            <?= Html::submitButton('<i class="material-icons">delete</i>',
                                [
                                    'class' => 'nav-link-icon mr-2 mb-2 p-1 ml-auto btn delete-preset',
                                    'name' => 'submit',
                                    'value' => 1,
                                    'data-form-id' => $form->id
                                ]) ?>
                            </div>
                            <?php ActiveForm::end() ?>
                        <?php else: ?>
                            <div class="row ml-auto">
                            <?= Html::button('<i class="material-icons">info</i>',
                                        [
                                            'class' => 'nav-link-icon mr-2 mb-2 p-1 ml-auto btn',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#itemInfoModal' . $preset->id,
                                        ]) ?>
                            </div>
                        <?php endif; ?>

                    <?php elseif ($purpose == PresetsListWidget::PURPOSE_START): ?>

                        <div class="row ml-auto">
                            <?= Html::a(
                                Html::button('<i class="material-icons">play_circle_filled</i>',
                                    [
                                        'class' => 'nav-link-icon mr-2 mb-2 p-1 btn'
                                    ]),
                                Url::to(['/set/start', 'id' => $preset->id]),
                                [
                                    'class' => 'ml-auto'
                                ]
                            ) ?>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<h5>У тебя нет программ для выбора. Создай свою первую программу и начни тренировку...</h5>
<?php endif; ?>

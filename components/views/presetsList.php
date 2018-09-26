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

?>
<?php if ($presets): ?>
<?php foreach ($presets as $preset): ?>
    <div class="row">
        <div class="col-lg col-sm-12 mb-2 p-0">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body d-flex pl-2 pt-2 pb-2">
                    <div class="col-lg p-0">
                        <h5 class="card-title">
                            <?= $preset->name ?>
                        </h5>
<!--                        <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время и т.д.</p>-->
                        <?php if   ($preset->discipline): ?>
                        <p class="card-text text-muted mb-0 dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Подробнее</p>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php foreach ($preset->discipline as $discipline): ?>
                            <span class="dropdown-item"><?= $discipline->name ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                             <p class="card-text text-muted mb-0">Нет упражнений</p>
                        <?php endif; ?>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<h5>У вас нет программ</h5>
<?php endif; ?>

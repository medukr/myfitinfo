<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 03.08.18
 * Time: 15:04
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php if ($sets): ?>
<?php foreach ($sets as $set): ?>
    <div class="row">
        <div class="col-lg col-sm-12 mb-2 p-0">
            <div href="<?= Url::to(['set/view', 'id' => $set->id]) ?>" class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body d-flex pl-2 pt-2 pb-2">
                    <div class="col-lg p-0">
                        <h5 class="card-title"><?= Html::decode($set->name) ?></h5>
                        <p class="card-text text-muted mb-0"><?= $set->getDate() ?></p>
                    </div>
                    <?php $form = ActiveForm::begin(['action' => Url::to(['set/delete']), 'method' => 'delete']) ?>
                    <?= Html::hiddenInput('Sets[id]', $set->id) ?>
                    <div class="row ml-auto">
                        <?= Html::a(
                                Html::button('<i class="material-icons">play_circle_filled</i>',
                                    [
                                            'class' => 'nav-link-icon mr-2 mb-2 p-1 btn'
                                    ]),
                                Url::to(['/set/training', 'id' => $set->id]),
                                [
                                        'class' => 'ml-auto'
                                ])
                        ?>
                        <?= Html::submitButton('<i class="material-icons">delete</i>',
                            [
                                    'class' => 'nav-link-icon mr-2 mb-2 p-1 btn ml-auto delete-set',
                                    'name' => 'submit',
                                    'value' => 1,
                                    'data-form-id' => $form->id
                            ]) ?>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<div class="row">
    <div class="col-lg col-sm-12 mb-2">
        <h3>Нет занятий</h3>
    </div>
</div>
<?php endif; ?>
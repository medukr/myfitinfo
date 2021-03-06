<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md">
    <div class="user-search">
        <?php $form = ActiveForm::begin([
            'action' => ['search'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'user_name') ?>

        <!--    --><?php // echo $form->field($model, 'create_at') ?>

        <!--    --><?php // echo $form->field($model, 'update_at') ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

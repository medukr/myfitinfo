<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-md-1 mt-2 ">
    <div class="main-content-container container-fluid px-4">
        <div class="row">
            <div class="col-lg col-sm-12 mb-2 px-0 ">
                <div class="card card-post--aside card-post--1">
                    <div class="site-login container my-2">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>Введите email, которвы Вы указывали при регистрации:</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-3 control-label'],
                            ],
                        ]); ?>
                        <?= $form->field($model, 'email')?>
                        <?= Html::submitButton('Отправить',
                            [
                                    'class' => 'btn btn-primary btn-pill'
                            ]) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

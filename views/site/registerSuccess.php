<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 28.08.18
 * Time: 16:28
 */

use yii\helpers\Html;
$this->title = 'Подтверждение регистрации';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-md-1 mt-2 ">
    <div class="main-content-container container-fluid px-4">
        <?= \app\components\FlashMessageWidget::widget() ?>
        <div class="row">
            <div class="col-lg col-sm-12 mb-2 px-0 ">
                <div class="card card-post--aside card-post--1">
                    <div class="site-login container my-2 text-center">
                        <h3>Вы успешно зарегестрированны</h3>
                        <p>На Ваш электронный адресс <strong><?= $user->email ?></strong> отправлено сообщение. Для подтверждения регистрации, пожалуйста, перейдите по ссылке в сообщении.</p>
                        <p>Если вы не получили сообщение, можете отправить его еще раз.</p>
                        <?= Html::button('Отправить еще раз.',
                            [
                                'class' => 'btn btn-warning btn-pill'
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


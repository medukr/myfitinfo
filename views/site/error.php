<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="error container">
    <div class="error__content">
        <h2><?= Html::encode($this->title) ?></h2>
        <h3>Что-то пошло не так!</h3>
        <p><?= nl2br(Html::encode($message)) ?></p>
        <?= Html::a('&larr; На галвную',
            Url::home(),
            [
                'class' => 'btn btn-accent btn-pill'
            ]) ?>
    </div>
    <!-- / .error_content -->
</div>
<!-- / .error -->



<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<!--<div class="site-error">

    <h1><?/*= Html::encode($this->title) */?></h1>

    <div class="alert alert-danger">
        <?/*= nl2br(Html::encode($message)) */?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>-->
<div class="error container">
    <div class="error__content">
        <h2><?= Html::encode($this->title) ?></h2>
        <h3>Something went wrong!</h3>
        <p><?= nl2br(Html::encode($message)) ?></p>
        <button type="button" class="btn btn-accent btn-pill">&larr; Go Back</button>
    </div>
    <!-- / .error_content -->
</div>
<!-- / .error -->



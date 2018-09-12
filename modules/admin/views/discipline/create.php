<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Disciplines */

$this->title = 'Добавить упражнение';
$this->params['breadcrumbs'][] = ['label' => 'Упражнения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

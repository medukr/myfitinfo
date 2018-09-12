<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Profiles */

$this->title = 'Изменить профиль - ID:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Профили', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ID:' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="profiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

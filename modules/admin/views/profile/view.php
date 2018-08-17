<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Profiles */

$this->title = 'Профиль пользователя - ID:' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('To User', ['user/view', 'id' => $model->user_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete Profile', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'image',
                'value' => function ($data) {
                    return Html::img($data->getImage(),
                        [
                                'style' => 'width:200px'
                        ]);
                },
                'format' => 'html'
            ],
            'id',
            'user_id',
            'name',
            'surname',
            'height',
            'age',

        ],
    ]) ?>

</div>

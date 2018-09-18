<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Presets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Программы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'user_id',
            'create_at',
            'update_at',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Дисциплина',
                'value' => function ($data) {
                    return $data->disciplines->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',
                            Url::to(['discipline/view', 'id' => $model->disciplines->id])
                        );
                    },
                ],
            ]

        ],
    ]); ?>
</div>

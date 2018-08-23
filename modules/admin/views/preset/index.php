<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PresetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user_id . ' ' . Html::a('туда->',
                            Url::to(['user/view', 'id' => $data->user_id]),
                            [
                                'class' => 'label label-primary'
                            ]);
                },
                'format' => 'html'
            ],
            'create_at',
            'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h3>Поиск:</h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

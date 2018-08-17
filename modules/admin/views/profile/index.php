<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profiles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
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
//            'height',
            'age',
            'name',
            'surname',
            [
                    'attribute' => 'image',
                    'value' => function($data){
                        return Html::img($data->getImage(), [
                                'style' => 'width:50px'
                        ]);
                    },
                    'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h3>Поиск:</h3>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
</div>

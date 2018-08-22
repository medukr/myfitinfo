<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\DisciplinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Disciplines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'description:ntext',
            [
                'attribute' => 'image',
                'value' => function ($data) {
                    return Html::img($data->getImage(),
                        [
                            'style' => 'width:100px',
                        ]);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user_id . ' ' . Html::a('туда ->', Url::to(['user/view', 'id' => $data->user_id]),
                            [
                                'class' => 'label label-primary',
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

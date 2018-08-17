<?php

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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'image',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h3>Поиск:</h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

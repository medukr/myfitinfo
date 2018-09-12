<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить пользователя (но это пока не работает)', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                    'attribute' => 'id',
                    'label' => 'ID',
                    'format' => 'text',
            ],
            'email:email',
            'user_name',
            [
                    'attribute' => 'is_admin',
                    'filter' => [
                            '0' => "Польз.",
                            '1' => "Админ.",
                    ],
                    'value' => function($data){
                    return $data->is_admin ? '<span class="label label-danger">Администратор</span>' : '<span class="label label-primary">Пользователь</span>';
                    },
                    'format' => 'html',
            ],
            'create_at',
            'update_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {link} {update} {delete} ',
                'buttons' => [
                    'link' => function($url, $model, $key){
                        if ($model->profile){
                            return Html::a('<i class="fa fa-address-card"></i>',
                                Url::to(['profile/view', 'id' => $model->profile['id']])
                            );
                        }
                    }
                ],
            ]

        ],
    ]); ?>

    <h3>Поиск:</h3>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = 'Пользователь - ID:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->profile): ?>
        <?= Html::a('К профилю', ['profile/view', 'id' => $model->profile->id], ['class' => 'btn btn-success']) ?>
        <?php else: ?>
        <?= Html::button('Нету профиля', ['class' => 'btn btn-warning']) ?>
        <?php endif; ?>
        <?= Html::a('Удалить пользователя', ['delete', 'id' => $model->id], [
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
            'email:email',
            'user_name',
            [
                    'attribute' => 'is_admin',
                    'value' => function($data){
                    return $data->is_admin ? '<span class="label label-danger">Администратор</span>' : '<span class="label label-primary">Пользователь</span>';
                    },
                    'format' => 'html',
            ],
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>

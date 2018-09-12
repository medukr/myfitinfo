<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $count_users['count_users'] ?></h3>
                <p>Всего пользователей</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?= Url::to(['user/index']) ?>" class="small-box-footer">Больше <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

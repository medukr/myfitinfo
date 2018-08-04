<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 03.08.18
 * Time: 15:04
 */
use yii\helpers\Url;
?>
<?php if ($sets): ?>
<?php foreach ($sets as $set): ?>
    <div class="row">
        <div class="col-lg col-sm-12 mb-2 p-0">
            <div href="<?= Url::to(['set/view', 'id' => $set->id]) ?>" class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body d-flex pl-2 pt-2 pb-2">
                    <div class="col-lg p-0">
                        <h5 class="card-title"><?= $set->name ?></h5>
                        <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время, что-нибуть, норм смотрится</p>
                    </div>
                    <div class="row ml-auto">
                        <a href="<?= Url::to(['/set/training', 'id' => $set->id]) ?>" class="nav-link-icon mr-3 ml-auto"><i class="material-icons">play_circle_filled</i></a>
                        <a href="" class="nav-link-icon mr-3 ml-auto delete-set" data-id="<?= $set->id ?>"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<div class="row">
    <div class="col-lg col-sm-12 mb-2">
        <h3>Нет занятий</h3>
    </div>
</div>
<?php endif; ?>
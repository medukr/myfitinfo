<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 10:58
 */
use yii\helpers\Url;
?>

<?php foreach ($presets as $preset): ?>
    <div class="row">
        <div class="col-lg col-sm-12 mb-2">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body d-flex">
                    <h5 class="card-title">
                        <span class="text-fiord-blue flex-column d-flex" ><?= $preset->name ?></span>
                    </h5>
                    <div class="row ml-auto">
                        <?php if ($preset->user_id === Yii::$app->user->id): ?>
                        <a href="<?= Url::to(['/preset/edit', 'id' => $preset->id]) ?>" class="nav-link-icon mr-3 ml-auto"><i class="material-icons">edit</i></a>
                        <a href="" class="nav-link-icon mr-3 ml-auto delete-preset" data-id="<?= $preset->id ?>"><i class="material-icons">delete</i></a>
                        <?php else: ?>
                        <a href="" class="nav-link-icon mr-3 ml-auto" data-toggle="modal" data-target="#itemInfoModal<?= $preset->id?>" ><i class="material-icons">info</i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

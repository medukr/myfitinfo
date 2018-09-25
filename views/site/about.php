<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О проекте';


?>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-md-1 mt-2 ">
    <div class="main-content-container container-fluid px-2">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small card-post card-post--1">
                        <div class="card-post__image" style="background-image: url('/images/gym_disks_weight_bodybuilding_118105_2560x1600.jpg'); height: 200px">
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('/images/andrii_d.jpg');">Written by Anna Kunis</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-fiord-blue" href="#"><?= $this->title ?></a>
                            </h5>
                            <p class="card-text d-inline-block mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam architecto asperiores at, commodi consequatur debitis deserunt enim est, eum excepturi fugit id ipsa magnam natus officia quae rerum sapiente. Ad, distinctio expedita! Architecto molestiae nesciunt quod sapiente sequi tenetur. Accusantium corporis dicta eligendi laborum neque non nostrum, reprehenderit similique.</p>
                            <span class="text-muted">Команда <?= Yii::$app->params['siteUrl'] ?>.</span>
                            <br>
                            <p class="card-text text-muted d-inline-block mb-3">Связаться: <?= Yii::$app->params['teamEmail'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
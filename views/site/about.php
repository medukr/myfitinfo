<?php

/* @var $this yii\web\View */

$this->title = 'О проекте';

?>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-md-1 mt-2 ">
    <div class="main-content-container container-fluid px-4">
        <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2 px-0">
                    <div class="card card-small card-post card-post--1">
                        <div class="card-post__image" style="background-image: url('/images/gym_disks_weight_bodybuilding_118105_2560x1600.jpg'); height: 200px">
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('/images/andrii_d.jpg');">Written by Anna Kunis</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                                <a class="text-fiord-blue" href="#"><?= $this->title ?></a>
                            </h5>
                            <div class="text-justify">
                                <p>Это онлайн сервис для тех, кто занимается бодибилдингом, пауэрлифтингом, фитнесом, а также другими силовыми и аэробными видами спорта.</p>
                                <p>Вы получите много полезных возможностей. Ваши записи тренировок больше никогда не потеряются, а дневник будет доступен в любом месте и в любое время!</p>
                                <p>У вас в руках появится мощный инструмент, который содержит в себе <span class="text-accent">журнал тренировок</span>, <span class="text-accent">программы тренировок</span>, большой <span class="text-accent">каталог упражнений</span>, <span class="text-accent">замеры</span>, <span class="text-accent">статистику</span></p>
                                <p>Благодаря статистике, можно контролировать любые отклонения в вашем прогрессе, вовремя корректировать программу тренировок и двигаться точно к цели!</p>
                                <p> А функционал замеров поможет следить за внешними изменениями и оценить эффективность тренировочного процесса</p>
                            </div>
                            <span class="text-muted">Команда <?= Yii::$app->params['siteUrl'] ?>.</span>
                            <br>
                            <p class="card-text text-muted d-inline-block mb-3">Связаться: <?= Yii::$app->params['teamEmail'] ?></p>
                        </div>
                </div>

        </div>
    </div>
</main>
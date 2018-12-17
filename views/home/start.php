<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 25.07.18
 * Time: 10:39
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <?= \app\components\FlashMessageWidget::widget() ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Start</span>
                <h3 class="page-title">Выбор программы</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?= \app\components\PresetsListWidget::widget([
                'presets' => $presets,
                'purpose' => \app\components\PresetsListWidget::PURPOSE_START,
            ]) ?>
    </div>
</main>

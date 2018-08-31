<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 08.08.18
 * Time: 10:25
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <?= \app\components\FlashMessageWidget::widget() ?>
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Профиль</span>
                <h3 class="page-title">Мой профиль</h3>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-4 p-1">
                <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                        <div class="mb-3 mx-auto">
                            <img class="rounded-circle" src="<?= $profile->getImage() ?>" alt="User Avatar" width="200"> </div>
                        <h4 class="mb-0"><?= ucfirst($profile->name) ?></h4>
                    </div>
                    <div class="card-footer mx-auto">
                        <span class="text-muted d-block mb-2"><?= $profile->age ?> см</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 p-1">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Детали профиля</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <?php $form = ActiveForm::begin(['action' => Url::to(['/profile']), 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile, 'name')->textInput(['maxlength' => true, 'placeholder' => $profile->getAttributeLabel('name')] ) ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile, 'surname')->textInput(['maxlength' => true, 'placeholder' => $profile->getAttributeLabel('surname')] ) ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile->user, 'email')->textInput(['maxlenth' => true, 'type' => 'email', 'placeholder' => $profile->user->getAttributeLabel('email')]) ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile->user, 'user_name')->textInput(['maxlenth' => true, 'placeholder' => $profile->user->getAttributeLabel('user_name')]) ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile, 'age')->dropDownList(range(0,100) , ['options' => [$profile->age => ['selected' => true]]]) ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?= $form->field($profile, 'height')->dropDownList(range(0,280) , ['options' => [$profile->height => ['selected' => true]]]) ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <?= $form->field($profile, 'image', [
                                                    'options' => [
                                                            'class' => 'form-group custom-file w-100 col-md-5 ml-1'
                                                    ]
                                            ])->fileInput([
                                                    'class' => 'custom-file-input'
                                            ])->label('Обновить аватар', [
                                                    'class' => 'custom-file-label'
                                            ]) ?>
                                        </div>
                                        <button type="submit" class="btn btn-accent btn-pill font-weight-bold">ОБНОВИТЬ ПРОФИЛЬ</button>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

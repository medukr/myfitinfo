<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 17:03
 */
?>
<!-- Main Sidebar-->
<?= \app\components\MainSidebarWidget::widget() ?>
<!-- End Main Sidebar-->
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <?= \app\components\MainNavbarWidget::widget() ?>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Тренировка</span>
                <h3 class="page-title"><?= $set->name ?></h3>
            </div>
        </div>
        <!-- End Page Header -->
        <?php $k = 0; ?>
        <?php foreach ($set->working as $working): ?>
            <div class="row">
                <div class="col-lg col-sm-12 mb-2 p-0">
                    <div class="card card-small card-post <!--card-post--aside-->">
                        <div class="card-post__image" style="background-image: url('<?= $working->discipline->getImage()?>');"></div>
                        <div class="card-body d-flex pl-2 pt-2 pb-2">
                            <div class="col-lg p-0">
                                <h5 class="card-title">
                                    <span class="text-fiord-blue flex-column d-flex" ><?= $working->discipline->name ?></span>
                                </h5>
                                <p class="card-text text-muted mb-0">Теги или краткое описание, дата, время, что-нибуть, норм смотрится</p>
                            </div>
                            <div class="row ml-auto">
                                <a href="" class="nav-link-icon mr-0 ml-auto" data-toggle="modal" data-target="#itemInfoModal<?= $working->discipline->id?>"><i class="material-icons">info</i></a>
                            </div>
                        </div>
                        <?php if ($last_set): ?>
                        <?php if ($last_set->workingWithoutDiscipline[$k]->workingData): ?>
                        <div class="card-footer border-top pl-3 pt-2 pb-0 mb-0">
                            <p class="card-text text-muted mb-0">В прошлый раз:</p>
                        </div>
                        <div class="card-footer d-flex pl-2 pt-2 pb-2">
                            <div class="d-flex">
                                <?php foreach ($last_set->workingWithoutDiscipline[$k]->workingData as $item): ?>
                                    <div class="form-group mb-1 ml-2">
                                        <h5 class="mt-0 mb-0 text-muted text-center"><?= $item->weight ?></h5>
                                        <hr style="width: 90%; color: black; height: 1px; margin-top: 0.5em; margin-bottom: 0.5em; background: gray; ">
                                        <h5 class="mt-0 mb-0 text-muted text-center"><?= $item->iteration ?></h5>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="card-footer border-top d-flex pl-2 pt-2 pb-2">
                            <div class="d-flex working-data-list-<?= $working->id ?>">
                                <?= \app\components\WorkingDataListWidget::widget(compact('working')) ?>
                            </div>
                            <div class="form-group mb-1 ml-2">
                                <select id="weight-<?= $working->id ?>" class="form-control custom-select-lg">
                                    <option selected>0</option>
                                    <?php for ($i = 1; $i <= 150; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <hr style="width: 90%; color: black; height: 1px; margin-top: 0.5em; margin-bottom: 0.5em; background: black; " >
                                <select id="iteration-<?= $working->id ?>" class="form-control custom-select-lg">
                                    <option selected>0</option>
                                    <?php for ($i = 1; $i <= 150; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer p-2 border-top d-flex">
                            <button type="button" class="btn btn-lg btn-secondary add-iteration" data-id="<?= $working->id ?>">Добавить</button>
                            <button href="button" class="btn btn-sm mt-3 ml-auto delete-iteration" data-id="<?= $working->id ?>">Удалить послеедний</button>
                        </div>
                    </div>
                </div>
            </div>
            <?= \app\components\ModalDisciplineInfoWidget::widget(['discipline' => $working->discipline]) ?>
        <?php $k++; ?>
        <?php endforeach; ?>
    </div>
</main>

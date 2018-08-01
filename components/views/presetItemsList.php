<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 26.07.18
 * Time: 15:37
 */
?>

        <?php foreach ($preset->discipline as $discipline): ?>
            <div class="row" id="discipline-list">
                <div class="col-lg col-sm-12 mb-2">
                    <div class="card card-small card-post card-post--aside card-post--1">
                        <div class="card-post__image" style="background-image: url('<?= $discipline->getImage()?>');"></div>
                        <div class="card-body d-flex">
                            <h5 class="card-title">
                                <span class="text-fiord-blue flex-column d-flex" ><?= $discipline->name ?></span>
                            </h5>
                            <div class="row ml-auto">
                                <a href="" class="nav-link-icon mr-3 ml-auto" data-toggle="modal" data-target="#itemInfoModal<?= $discipline->id?>" ><i class="material-icons">info</i></a>
                                <a href="" class="nav-link-icon mr-3 ml-auto delete-preset-item" data-id="<?= $discipline->id ?>" data-preset-id="<?= $preset->id ?>" ><i class="material-icons">delete</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal item info-->
            <div class="modal fade" id="itemInfoModal<?= $discipline->id?>" tabindex="-1" role="dialog" aria-labelledby="itemInfoModal<?= $discipline->id?>Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="itemInfoModal<?= $discipline->id?>Title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= $discipline->description?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal item info-->
        <?php endforeach; ?>

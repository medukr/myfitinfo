<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 03.08.18
 * Time: 17:44
 */
?>
<!-- Modal item info-->
<div class="modal fade" id="itemInfoModal<?= $discipline->id?>" tabindex="-1" role="dialog" aria-labelledby="itemInfoModal<?= $discipline->id?>Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-post__image" style="background-image: url('<?= $discipline->getImage()?>'); height: 250px">
                <h5 class="modal-title text-white" id="itemInfoModal<?= $discipline->id?>Title"><?= $discipline->name?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <p class="card-text"><?= $discipline->description?></p>
            </div>
            <div class="modal-footer">
                <div class="text-muted border-top py-3">
                                <span class="d-inline-block">By
                                  <span class="text-fiord-blue" href="#">Alene Trenton</span>
                                </span>
                </div>
                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal item info-->

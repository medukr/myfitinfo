<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 27.08.18
 * Time: 15:45
 */
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="row">
        <div class="col-lg col-sm-12 p-0">
            <div class="alert alert-success alert-dismissible fade show my-2 with-shadows" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-check mx-2"></i>
                <strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="row">
        <div class="col-lg col-sm-12 p-0">
            <div class="alert alert-danger alert-dismissible fade show my-2 with-shadows" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-exclamation-triangle mx-2"></i>
                <strong><?php echo Yii::$app->session->getFlash('error'); ?></strong>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('info')): ?>
    <div class="row">
        <div class="col-lg col-sm-12 p-0">
            <div class="alert alert-accent alert-dismissible fade show my-2 with-shadows" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-info mx-2"></i>
                <strong><?php echo Yii::$app->session->getFlash('info'); ?></strong>
            </div>
        </div>
    </div>
<?php endif; ?>

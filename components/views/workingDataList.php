<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 03.08.18
 * Time: 16:21
 */
?>
<?php if ($working->workingData): ?>
    <?php foreach ($working->workingData as $item): ?>
    <div class="form-group mb-1 ml-2">
        <h5 class="mt-2 mb-0 text-center"><?= $item->weight ?></h5>
        <hr style="width: 90%; color: black; height: 1px; margin-top: 0.5em; margin-bottom: 0.5em; background: black; ">
        <h5 class="mt-0 mb-0 text-center"><?= $item->iteration ?></h5>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

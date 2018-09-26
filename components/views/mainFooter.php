<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 25.07.18
 * Time: 10:47
 */
use yii\helpers\Url;
?>
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0">
    <footer class="main-footer d-flex p-2 px-3 bg-white border-top ">
        <ul class="nav offset-lg-3 offset-md-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::home() ?>">Домой</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['site/about']) ?>">О проекте</a>
            </li>
        </ul>
        <span class="copyright ml-auto my-auto mr-2">©
            <?php if (date('o') == '2018'): ?>
            2018
            <?php else: ?>
            2018 - <?= date('o') ?>
            <?php endif; ?>
        </span>
        <span class="copyright ml-auto my-auto mr-2">v.1.0</span>
        <span class="copyright ml-auto my-auto mr-2">Design template
              <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
        </span>
    </footer>
</main>

<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 13.09.18
 * Time: 19:33
 */
?>
<p>Здравствуйте,
<?php
if ($model->profile) {
    echo ($model->profile->name != null) ? $model->profile->name : $model->user_name;
} else {
    echo $model->user_name;
}
?>!</p>
<br>
<p><b>Ваш новый пароль: </b><?= $model->new_password ?></p>
<br>
<p>С уважением, <?= Yii::$app->params['siteUrl'] ?></p>

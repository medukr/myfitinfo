<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 11.08.18
 * Time: 22:08
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\Html;

class AppModel extends ActiveRecord
{

    public function validateHtmlentities($attribute)
    {
//        С данной реаализацией при сохраниии имени 123 или 337 ошибка, хз
//        return $this->$attribute = htmlentities(trim($this->$attribute, ENT_QUOTES));
        return $this->$attribute = Html::encode(trim($this->$attribute));
    }
}
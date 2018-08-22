<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 21.08.18
 * Time: 17:03
 */

namespace app\components;


use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class AppHtmlentitiesBehavior extends Behavior
{

    public $descriptionAttribute = 'description';

    public $attributes;


    public function init()
    {
        parent::init();

//        if (empty($this->attributes)) {
//            $this->attributes = [
//                BaseActiveRecord::EVENT_AFTER_FIND => [$this->descriptionAttribute],
//                BaseActiveRecord::EVENT_BEFORE_UPDATE => [$this->descriptionAttribute]
//                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->descriptionAttribute]
//            ];
//        }
    }


    public function events()
    {
        $events = [];

        foreach ($this->attributes as $key => $value){
            $events[$key] = $key;
        }

        return $events;
    }


    public function getValue($attribute, $event)
    {
        switch ($event) {

            case BaseActiveRecord::EVENT_AFTER_FIND :
                $value = html_entity_decode($attribute, 3, 'UTF-8');
                break;

            case BaseActiveRecord::EVENT_BEFORE_INSERT :
                $value =  htmlentities(trim($attribute),ENT_QUOTES, 'utf-8', false);
                break;

            case BaseActiveRecord::EVENT_BEFORE_UPDATE :
                $value =  htmlentities(trim($attribute),ENT_QUOTES, 'utf-8', false);
                break;

            default:
                $value = false;
        }

        return $value;
    }


    public function afterFind()
    {
        foreach ($this->attributes[BaseActiveRecord::EVENT_AFTER_FIND] as $attribute){

                $this->owner->$attribute = $this->getValue($this->owner->$attribute, BaseActiveRecord::EVENT_AFTER_FIND);

        }
    }


    public function beforeUpdate()
    {
        foreach ($this->attributes[BaseActiveRecord::EVENT_BEFORE_UPDATE] as $attribute){

                $this->owner->$attribute = $this->getValue($this->owner->$attribute, BaseActiveRecord::EVENT_BEFORE_UPDATE);

        }

    }


    public function beforeInsert()
    {
        foreach ($this->attributes[BaseActiveRecord::EVENT_BEFORE_INSERT] as $attribute){

            $this->owner->$attribute = $this->getValue($this->owner->$attribute, BaseActiveRecord::EVENT_BEFORE_INSERT);

        }
    }

}
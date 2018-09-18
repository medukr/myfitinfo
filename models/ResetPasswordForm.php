<?php

namespace app\models;


/**
 * This is the model class for table "user".
 *
 * @property string $email
 */
class ResetPasswordForm extends \yii\db\ActiveRecord
{

    public $email;


    /**
     * @inheritdoc
     */
    public static function tableName()

    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
        ];
    }

}

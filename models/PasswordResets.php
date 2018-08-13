<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "password_resets".
 *
 * @property int $id
 * @property string $email
 * @property string $token
 */
class PasswordResets extends AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'password_resets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'token' => 'Token',
        ];
    }
}

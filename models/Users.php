<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string $auth_key
 * @property int $is_admin
 * @property string $create_at
 * @property string $update_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'create_at'], 'required'],
            [['is_admin'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['email', 'password', 'auth_key'], 'string', 'max' => 255],
            [['user_name'], 'string', 'max' => 64],
            [['email'], 'unique'],
            [['user_name'], 'unique'],
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
            'user_name' => 'User Name',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'is_admin' => 'Is Admin',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}

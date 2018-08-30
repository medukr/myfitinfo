<?php

namespace app\models;

use Yii;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $secondPassword
 * @property string $auth_key
 * @property string $email
 * @property int $is_admin
 * @property string $create_at
 * @property string $update_at
 */
class RegisterForm extends \yii\db\ActiveRecord
{

    public $username;
    public $password;
    public $email;
    public $secondPassword;

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
            ['user_name', 'trim'],
            ['user_name', 'required'],
            ['user_name', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже зарезервирован.'],
            ['user_name', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => '"Этот E-mail уже используется.'],
            [['user_name', 'password'], 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['secondPassword', 'string', 'min' => 6],
            ['secondPassword', 'required'],
            ['secondPassword', 'validateSecondPassword'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'user_name' => 'Логин',
            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'is_admin' => 'Администратор',
            'create_at' => 'Создано',
            'update_at' => 'Обновлено',
        ];
    }

    public function registerUser()
    {
        if (!$this->validate()){
            return null;
        }

        $user = new User();
        $user->user_name = $this->user_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->email = $this->email;
        $user->is_admin = 0;

        return $user->save() ? $user : null;

    }

    public function validateSecondPassword()
    {
        if ($this->password != $this->secondPassword){
            $this->addError('secondPassword', 'Повторите пароль');
        }
    }

}

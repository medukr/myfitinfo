<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

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
 * @property object $profile
 */
class User extends AppModel implements IdentityInterface
{

    const ADMIN_ID = 1;
    const IS_ADMIN = 1;

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
            [['email', 'password'], 'required'],
            [['is_admin'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['email', 'password', 'auth_key'], 'string', 'max' => 255],
            [['user_name'], 'string', 'max' => 64],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['user_name'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),

            ],
            [
                'class' => AppHtmlentitiesBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['user_name'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['user_name'],
                ],
            ],
        ];
    }


    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['user_name' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }


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

    public function setPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}



<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "profiles".
 *
 * @property int $id
 * @property int $user_id
 * @property int $height
 * @property int $age
 * @property string $name
 * @property string $surname
 * @property string $image
 */
class Profiles extends AppModel
{
    const AVATARS_PATH = '/uploads/avatars/';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    public function behaviors()
    {
        return [
            [
                'class' => AppHtmlentitiesBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['name', 'surname'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['name', 'surname'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'height', 'age'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 64],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID Пользователя',
            'height' => 'Рост',
            'age' => 'Возраст',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'image' => 'Аватар',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public static function findUserProfile()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->limit(1)
            ->one();

    }


    public function getImage()
    {
        if  ($this->image && file_exists(Yii::getAlias('@webroot'). self::AVATARS_PATH . $this->image)){

            return self::AVATARS_PATH . $this->image;
        }

        return '/images/no-user-image.png';
    }



    public function uploadImage()
    {
        $image = UploadedFile::getInstance($this, 'image');

        $user_profile = static::find()->where(['id' => $this->id])->limit(1)->one();

        $this->image = $user_profile->image;

        if ($image){

            $nameImage = Yii::$app->security->generateRandomString(24) . '.' . $image->extension;

            $imageCrop = Image::thumbnail($image->tempName, '200', '200');

            if (!$imageCrop->save(Yii::getAlias('@webroot') . self::AVATARS_PATH . $nameImage, ['quality' => 80])) {
                return false;
            }

            if ($this->image && file_exists(Yii::getAlias('@webroot') . self::AVATARS_PATH . $this->image)){
                unlink(Yii::getAlias('@webroot') . self::AVATARS_PATH . $this->image);
            }

            $this->image = $nameImage;
        }
    }



    public function updateProfile()
    {
        if($this->validate()){

          $this->uploadImage();

          return $this->save();
        }

        return false;
    }

    public static function findWhereUserId($id)
    {
        return self::find()
            ->where('user_id = :id', [':id' => (int) $id])
            ->one();
    }
}

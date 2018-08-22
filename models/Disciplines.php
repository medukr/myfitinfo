<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
use Yii;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "disciplines".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $user_id
 */
class Disciplines extends AppModel
{
    const IMAGE_PATH = '/uploads/disciplines/';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AppHtmlentitiesBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['description'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['description','name'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['description','name'],
                ],
            ],
        ];
    }



    public function getImage()
    {
        return ($this->image && file_exists(Yii::getAlias('@webroot') . self::IMAGE_PATH . $this->image)) ? self::IMAGE_PATH . $this->image :'/images/no-image.png';
    }


    public static function findWhereUserOrAdmin()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orWhere(['user_id' => User::ADMIN_ID ])
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'image' => 'Картинка',
            'user_id' => 'ID автора',
        ];
    }


    public function uploadImage()
    {
        $image = UploadedFile::getInstance($this, 'image');

        if ($this->id) {
            $old_model = static::find()->where(['id' => $this->id])->limit(1)->one();
            $this->image = $old_model->image;
        }

        if ($image){

            $nameImage = Yii::$app->security->generateRandomString(24) . '.' . $image->extension;

            $imageCrop = Image::thumbnail($image->tempName,'1280', '720');

            if (!$imageCrop->save(Yii::getAlias('@webroot') . self::IMAGE_PATH . $nameImage, ['quality' => 80])) {
                return false;
            }

            if ($this->image && file_exists(Yii::getAlias('@webroot') . self::IMAGE_PATH . $this->image)){
                unlink(Yii::getAlias('@webroot') . self::IMAGE_PATH . $this->image);
            }

            $this->image = $nameImage;
        }
    }


    public function updateDiscipline()
    {
        if ($this->validate()){

            $this->uploadImage();

            return $this->save();
        }
        return false;
    }

}

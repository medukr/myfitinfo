<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presets_disciplines".
 *
 * @property int $id
 * @property int $preset_id
 * @property int $discipline_id
 */
class PresetsDisciplines extends AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presets_disciplines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preset_id', 'discipline_id'], 'required'],
            [['preset_id', 'discipline_id'], 'integer'],
        ];
    }

    public function getPresets()
    {
        return $this->hasOne(Presets::className(), ['id' => 'preset_id']);
    }

    public function getDisciplines()
    {
        return $this->hasOne(Disciplines::className(), ['id' => 'discipline_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'preset_id' => 'Preset ID',
            'discipline_id' => 'Discipline ID',
        ];
    }

    public static function deleteAllWherePresetId($id)
    {
        return self::deleteAll('preset_id = :id',[':id' => $id]);
    }


}

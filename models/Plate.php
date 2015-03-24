<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plate".
 *
 * @property integer $plate_id
 * @property string $plate_image
 *
 * @property PlateInputOption[] $plateInputOptions
 */
class Plate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_image'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plate_id' => 'Plate ID',
            'plate_image' => 'Plate Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlateInputOptions()
    {
        return $this->hasMany(PlateInputOption::className(), ['plate_id' => 'plate_id']);
    }
}

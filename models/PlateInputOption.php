<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plate_input_option".
 *
 * @property integer $option_id
 * @property integer $plate_id
 * @property string $option_name
 *
 * @property Plate $plate
 */
class PlateInputOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plate_input_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_id'], 'required'],
            [['plate_id'], 'integer'],
            [['option_name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'plate_id' => 'Plate ID',
            'option_name' => 'Option Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlate()
    {
        return $this->hasOne(Plate::className(), ['plate_id' => 'plate_id']);
    }
}

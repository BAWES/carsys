<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "plate".
 *
 * @property integer $plate_id
 * @property string $plate_image
 *
 * @property PlateInputOption[] $plateInputOptions
 */
class Plate extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plate';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plate_image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'plate_id' => 'Plate ID',
            'plate_image' => 'Plate Image',
        ];
    }

    public function getImageUrl() {
        return Url::to('@web/images/plate/'.$this->plate_image);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlateInputOptions() {
        return $this->hasMany(PlateInputOption::className(), ['plate_id' => 'plate_id']);
    }

}

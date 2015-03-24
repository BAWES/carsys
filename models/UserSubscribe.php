<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_subscribe".
 *
 * @property integer $subscribe_id
 * @property integer $user_id
 * @property integer $car_id
 * @property string $subscribe_datetime
 *
 * @property Appuser $user
 * @property Car $car
 */
class UserSubscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'subscribe_datetime'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['subscribe_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subscribe_id' => 'Subscribe ID',
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'subscribe_datetime' => 'Subscribe Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Appuser::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['car_id' => 'car_id']);
    }
}

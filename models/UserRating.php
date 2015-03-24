<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rating".
 *
 * @property integer $rating_id
 * @property integer $car_id
 * @property integer $user_id
 * @property integer $rating_hotness
 * @property integer $rating_driving
 * @property integer $rating_ride
 * @property string $rating_datetime
 *
 * @property Car $car
 * @property Appuser $user
 */
class UserRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'user_id', 'rating_datetime'], 'required'],
            [['car_id', 'user_id', 'rating_hotness', 'rating_driving', 'rating_ride'], 'integer'],
            [['rating_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating_id' => 'Rating ID',
            'car_id' => 'Car ID',
            'user_id' => 'User ID',
            'rating_hotness' => 'Rating Hotness',
            'rating_driving' => 'Rating Driving',
            'rating_ride' => 'Rating Ride',
            'rating_datetime' => 'Rating Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Appuser::className(), ['user_id' => 'user_id']);
    }
}

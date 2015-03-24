<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $car_id
 * @property string $car_search_string
 * @property string $car_datetime
 *
 * @property UserNotification[] $userNotifications
 * @property UserPost[] $userPosts
 * @property UserRating[] $userRatings
 * @property UserSubscribe[] $userSubscribes
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_datetime'], 'required'],
            [['car_datetime'], 'safe'],
            [['car_search_string'], 'string', 'max' => 128],
            [['car_search_string'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'car_search_string' => 'Car Search String',
            'car_datetime' => 'Car Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserNotifications()
    {
        return $this->hasMany(UserNotification::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPosts()
    {
        return $this->hasMany(UserPost::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRatings()
    {
        return $this->hasMany(UserRating::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSubscribes()
    {
        return $this->hasMany(UserSubscribe::className(), ['car_id' => 'car_id']);
    }
}

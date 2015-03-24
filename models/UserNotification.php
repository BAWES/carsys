<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_notification".
 *
 * @property integer $notification_id
 * @property integer $user_id
 * @property integer $car_id
 * @property integer $notification_sent
 * @property integer $notification_datetime
 *
 * @property Appuser $user
 * @property Car $car
 */
class UserNotification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'notification_sent', 'notification_datetime'], 'required'],
            [['user_id', 'car_id', 'notification_sent', 'notification_datetime'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notification_id' => 'Notification ID',
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'notification_sent' => 'Notification Sent',
            'notification_datetime' => 'Notification Datetime',
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

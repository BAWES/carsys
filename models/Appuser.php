<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appuser".
 *
 * @property integer $user_id
 * @property string $user_mobile_id
 * @property string $user_ip_address
 * @property string $user_last_active_datetime
 * @property string $user_created_datetime
 *
 * @property UserAbuse[] $userAbuses
 * @property UserNotification[] $userNotifications
 * @property UserPost[] $userPosts
 * @property UserRating[] $userRatings
 * @property UserSubscribe[] $userSubscribes
 */
class Appuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_last_active_datetime', 'user_created_datetime'], 'required'],
            [['user_last_active_datetime', 'user_created_datetime'], 'safe'],
            [['user_mobile_id', 'user_ip_address'], 'string', 'max' => 128],
            [['user_mobile_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_mobile_id' => 'User Mobile ID',
            'user_ip_address' => 'User Ip Address',
            'user_last_active_datetime' => 'User Last Active Datetime',
            'user_created_datetime' => 'User Created Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAbuses()
    {
        return $this->hasMany(UserAbuse::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserNotifications()
    {
        return $this->hasMany(UserNotification::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPosts()
    {
        return $this->hasMany(UserPost::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRatings()
    {
        return $this->hasMany(UserRating::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSubscribes()
    {
        return $this->hasMany(UserSubscribe::className(), ['user_id' => 'user_id']);
    }
}

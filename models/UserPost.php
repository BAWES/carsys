<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_post".
 *
 * @property integer $post_id
 * @property integer $car_id
 * @property integer $user_id
 * @property string $post_image
 * @property string $post_caption
 * @property string $post_datetime
 *
 * @property UserAbuse[] $userAbuses
 * @property Car $car
 * @property Appuser $user
 */
class UserPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'user_id', 'post_caption', 'post_datetime'], 'required'],
            [['car_id', 'user_id'], 'integer'],
            [['post_caption'], 'string'],
            [['post_datetime'], 'safe'],
            [['post_image'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'car_id' => 'Car ID',
            'user_id' => 'User ID',
            'post_image' => 'Post Image',
            'post_caption' => 'Post Caption',
            'post_datetime' => 'Post Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAbuses()
    {
        return $this->hasMany(UserAbuse::className(), ['post_id' => 'post_id']);
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

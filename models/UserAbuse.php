<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_abuse".
 *
 * @property integer $abuse_id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $abuse_datetime
 *
 * @property Appuser $user
 * @property UserPost $post
 */
class UserAbuse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_abuse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id', 'abuse_datetime'], 'required'],
            [['user_id', 'post_id'], 'integer'],
            [['abuse_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'abuse_id' => 'Abuse ID',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'abuse_datetime' => 'Abuse Datetime',
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
    public function getPost()
    {
        return $this->hasOne(UserPost::className(), ['post_id' => 'post_id']);
    }
}

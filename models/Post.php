<?php

namespace app\models;

use app\models\extend\AbstractActiveRecord;

/**
 * Class Post
 *
 * @package app\models
 *
 * @property int  $id
 * @property int  $userID
 * @property int  $taskID
 * @property int  $content
 * @property int  $timeCreated
 *
 * @property User $user
 * @property Task $task
 */
class Post extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['userID', 'taskID', 'timeCreated'], 'required'],
            ['content', 'safe']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID'
        ];
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'taskID']);
    }

    ### functions
}
<?php

namespace app\models;

use app\models\extend\AbstractActiveRecord;

/**
 * Class UserTask
 *
 * @package app\models
 *
 * @property int    $id
 * @property int    $userID
 * @property int    $taskID
 * @property int    $timeCreated
 *
 * @property User   $user
 * @property Task[] $tasks
 */
class UserTask extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user_task';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [];
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
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'taskID']);
    }

    ### functions
}
<?php

namespace app\models;

use app\models\extend\AbstractActiveRecord;

/**
 * Class Task
 *
 * @package app\models
 *
 * @property int    $id
 * @property int    $userID
 * @property string $title
 * @property string description
 * @property int    $timeCreated
 * @property int    $timeStart
 * @property int    $timeEnd
 *
 * @property User   $user
 */
class Task extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['userID', 'title', 'timeCreated'], 'required'],
            [['description', 'timeStart', 'timeEnd'], 'safe']
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

    ### functions
}
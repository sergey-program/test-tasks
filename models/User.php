<?php

namespace app\models;

use app\models\extend\AbstractActiveRecord;

/**
 * Class User
 *
 * @package app\models
 *
 * @property int      $id
 * @property string   $username
 * @property string   $email
 * @property string   $password
 * @property int      $timeCreated
 * @property string   $authKey
 * @property string   $timeZone
 */
class User extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'timeCreated', 'authKey'], 'required'],
            ['timeZone', 'safe'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique'],
            ['email', 'email']
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

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        \Yii::$app->authManager->revokeAll($this->id);

        return parent::beforeDelete();
    }

    ### relations

    ### functions

    /**
     * @return string
     */
    public static function generateAuthKey()
    {
        return md5(time() . mt_rand(1, 1000));
    }
}
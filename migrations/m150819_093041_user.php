<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150819_093041_user
 */
class m150819_093041_user extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => 'pk',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NULL',
            'password' => Schema::TYPE_STRING . ' NULL',
            'timeCreated' => Schema::TYPE_BIGINT . ' NULL',
            'authKey' => Schema::TYPE_STRING . ' NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        echo "m150819_093041_user reverted.\n";

        return true;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150820_081535_user_task
 */
class m150820_081535_user_task extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->createTable('user_task', [
            'id' => 'pk',
            'userID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'taskID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'timeCreated' => Schema::TYPE_BIGINT . ' NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropTable('user_task');

        echo "m150820_081535_user_task reverted.\n";

        return true;
    }
}
<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150819_095945_task
 */
class m150819_095945_task extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->addColumn('user', 'timeZone', Schema::TYPE_STRING . ' NULL');

        $this->createTable('task', [
            'id' => 'pk',
            'userID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NULL',
            'description' => Schema::TYPE_TEXT . ' NULL',
            'timeCreated' => Schema::TYPE_BIGINT . ' NULL',
            'timeStart' => Schema::TYPE_BIGINT . ' NULL',
            'timeEnd' => Schema::TYPE_BIGINT . ' NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'timeZone');
        $this->dropTable('task');

        echo "m150819_095945_task reverted.\n";

        return true;
    }
}
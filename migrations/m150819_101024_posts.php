<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150819_101024_posts
 */
class m150819_101024_posts extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => 'pk',
            'userID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'taskID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NULL',
            'timeCreated' => Schema::TYPE_BIGINT . ' NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropTable('post');

        echo "m150819_101024_posts reverted.\n";

        return true;
    }
}
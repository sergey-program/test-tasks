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
    private function checkAuthManagerTables()
    {
        $db = Yii::$app->getDb();
        $authManager = \Yii::$app->getAuthManager();

        $tableSchema = (
            $db->getTableSchema($authManager->itemTable, true) &&
            $db->getTableSchema($authManager->itemChildTable, true) &&
            $db->getTableSchema($authManager->assignmentTable, true) &&
            $db->getTableSchema($authManager->ruleTable, true)
        );

        return $tableSchema;
    }

    /**
     * @return bool
     */
    public function safeUp()
    {
        if (!$this->checkAuthManagerTables()) {
            echo "You must execute 'php yii migrate/up --migrationPath=@yii/rbac/migrations' first.\n";

            return false;
        }

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

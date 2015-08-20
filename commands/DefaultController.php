<?php

namespace app\commands;

use app\models\Task;
use app\models\User;
use app\models\UserTask;
use yii\console\Controller;

/**
 * Class DefaultController
 *
 * @package app\commands
 */
class DefaultController extends Controller
{
    /**
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionUsers()
    {
        $userList = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'timeZone' => 'Australia/Sydney'
            ],
            [
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => 'user1',
                'timeZone' => 'Europe/Amsterdam'
            ],
            [
                'username' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => 'user2',
                'timeZone' => 'Africa/Lusaka'
            ],
            [
                'username' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => 'user3',
                'timeZone' => 'America/Adak'
            ],

        ];

        foreach ($userList as $userEntry) {
            $user = User::findOne(['email' => $userEntry['email']]);

            if (!$user) {
                $user = new User();
            }

            $user->username = $userEntry['username'];
            $user->email = $userEntry['email'];
            $user->password = \Yii::$app->security->generatePasswordHash($userEntry['password']);
            $user->timeCreated = time();
            $user->authKey = User::generateAuthKey();
            $user->timeZone = $userEntry['timeZone'];

            $user->save();
        }
    }

    /**
     *
     */
    public function actionTasks()
    {
        $user = User::findOne(['username' => 'admin']);

        if (!$user) {
            throw new \Exception('Admin user not exists.');
        }

        \Yii::$app->db->createCommand('TRUNCATE task; TRUNCATE user_task;')->execute();

        $taskList = [
            [
                'userID' => $user->id,
                'title' => \Yii::$app->security->generateRandomString(8),
                'description' => 'some description',
                'timeStart' => time() - (60 * 60 * 24 * 7),
                'timeEnd' => time() + (60 * 60 * 24 * 7)
            ],
            [
                'userID' => $user->id,
                'title' => \Yii::$app->security->generateRandomString(6),
                'description' => 'some description',
                'timeStart' => time() - (60 * 60 * 5),
                'timeEnd' => time() + (60 * 60 * 5)
            ],
            [
                'userID' => $user->id,
                'title' => \Yii::$app->security->generateRandomString(4),
                'description' => 'some description',
                'timeStart' => time() + (60 * 60 * 2),
                'timeEnd' => time() + (60 * 60 * 24)
            ],
            [
                'userID' => $user->id,
                'title' => \Yii::$app->security->generateRandomString(7),
                'description' => 'some description',
                'timeStart' => time() + (60 * 60 * 24 * 1),
                'timeEnd' => time() + (60 * 60 * 24 * 7)
            ]
        ];

        $tasks = null;

        foreach ($taskList as $taskEntry) {
            $task = new Task();
            $task->userID = $taskEntry['userID'];
            $task->title = $taskEntry['title'];
            $task->description = $taskEntry['description'];
            $task->timeStart = $taskEntry['timeStart'];
            $task->timeEnd = $taskEntry['timeEnd'];
            $task->timeCreated = time();
            $task->save();

            $tasks[] = $task;
        }


        $this->assignRandom($tasks);
    }

    /**
     * @param Task[]|null $tasks
     */
    private function assignRandom($tasks)
    {
        $users = User::find()->where('email != "admin@gmail.com"')->all();

        $randomUserKey = mt_rand(0, count($users) - 1);
        $randomTaskKey = mt_rand(0, count($tasks) - 1);

        $user = $users[$randomUserKey];
        $task = $tasks[$randomTaskKey];

        $userTask = new UserTask();
        $userTask->userID = $user->id;
        $userTask->taskID = $task->id;
        $userTask->timeCreated = time();
        $userTask->save();
    }
}

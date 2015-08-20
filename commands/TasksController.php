<?php

namespace app\commands;

use app\models\Task;
use app\models\User;
use yii\console\Controller;

/**
 * Class TasksController
 *
 * @package app\commands
 */
class TasksController extends Controller
{
    /**
     *
     */
    public function actionView()
    {
        /** @var User[] $users */
        $users = User::find()->all();
        /** @var Task[] $tasks */
        $tasks = Task::find()->all();

        foreach ($users as $user) {
            echo 'Username : ' . $user->username . "\n";
            echo 'TimeZone : ' . $user->timeZone . "\n";
            echo 'Tasks : ' . "\n";

            foreach ($tasks as $task) {
                echo "\t" . 'Task : ' . $task->title . "\n";

                \Yii::$app->formatter->timeZone = 'UTC';
                echo "\t" . 'Time UTC start : ' . \Yii::$app->formatter->asDatetime($task->timeStart) . "\n";
                echo "\t" . 'Time UTC end : ' . \Yii::$app->formatter->asDatetime($task->timeEnd) . "\n\n";

                \Yii::$app->formatter->timeZone = $user->timeZone;
                echo "\t" . 'Time ' . $user->timeZone . ' start : ' . \Yii::$app->formatter->asDatetime($task->timeStart) . "\n";
                echo "\t" . 'Time ' . $user->timeZone . ' end : ' . \Yii::$app->formatter->asDatetime($task->timeEnd) . "\n";

                echo "\t--------\n";

                // timestamp wont change if we apply timezone
                $date = new \DateTime();
                $date->setTimestamp($task->timeStart);
                $date->setTimezone(new \DateTimeZone($user->timeZone));
                echo $task->timeStart . ' => ' . $date->getTimestamp() . "\n"; // same timestamp
            }

            echo "=========== \n";
        }
    }
}
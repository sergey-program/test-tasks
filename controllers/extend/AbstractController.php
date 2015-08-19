<?php

namespace app\controllers\extend;

use yii\web\Controller;

/**
 * Class AbstractController
 *
 * @package app\controllers\extend
 */
class AbstractController extends Controller
{
    /**
     * @return \app\components\UserExtended
     */
    public function getUser()
    {
        return \Yii::$app->user;
    }

    /**
     * @param string|null $name
     * @param string|null $defaultValue
     *
     * @return array|string|null
     */
    public function post($name = null, $defaultValue = null)
    {
        return \Yii::$app->request->post($name = null, $defaultValue = null);

    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return \Yii::$app->request->isPost;
    }
}
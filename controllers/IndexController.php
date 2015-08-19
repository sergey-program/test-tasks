<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\controllers
 */
class IndexController extends AbstractController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
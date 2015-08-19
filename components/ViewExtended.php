<?php

namespace app\components;

use yii\web\View;

/**
 * Class ViewExtended
 *
 * @package app\components
 *
 * @property array  $aBread
 * @property bool   $bAllowIndex
 */
class ViewExtended extends View
{
    private $breads;
    private $allowIndex = false;
    private $allowAnalytic = false;

    /**
     * Set default page title.
     */
    public function init()
    {
        parent::init();

        $this->setPageTitle(\Yii::$app->name);
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setPageTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->title;
    }

    /**
     * @param array|string $bread
     *
     * @return $this
     */
    public function addBread($bread)
    {
        $this->breads[] = $bread;

        return $this;
    }

    /**
     * @param array $breads
     *
     * @return $this
     */
    public function setBreads(array $breads)
    {
        $this->breads = $breads;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getBreads()
    {
        return ($this->hasBreads()) ? $this->breads : null;
    }

    /**
     * @return bool
     */
    public function hasBreads()
    {
        return is_array($this->breads) && !empty($this->breads);
    }

    /**
     * @return \yii\web\Session
     */
    public function getSession()
    {
        return \Yii::$app->session;
    }

    /**
     * @param string $lang
     *
     * @return bool
     */
    public function isLang($lang)
    {
        $lang = ($lang == 'ru') ? 'ru-RU' : $lang;
        $lang = ($lang == 'en') ? 'en-US' : $lang;

        return (\Yii::$app->language == $lang);
    }

    /**
     * @return \app\components\UserExtended
     */
    public function getUser()
    {
        return \Yii::$app->user;
    }

    /**
     * @param boolean $allowIndex
     *
     * @return $this
     */
    public function setAllowIndex($allowIndex)
    {
        $this->allowIndex = $allowIndex;

        return $this;
    }

    /**
     * @return bool
     */
    public function allowIndex()
    {
        return $this->allowIndex;
    }

    /**
     * @param bool $allowAnalytic
     *
     * @return $this
     */
    public function setAllowAnalytic($allowAnalytic)
    {
        $this->allowAnalytic = $allowAnalytic;

        return $this;
    }

    /**
     * @return bool
     */
    public function allowAnalytic()
    {
        return $this->allowAnalytic;
    }
}
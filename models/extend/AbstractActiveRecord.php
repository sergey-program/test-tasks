<?php

namespace app\models\extend;

use yii\db\ActiveRecord;

/**
 * Class AbstractActiveRecord
 *
 * @package app\models\extend
 */
abstract class AbstractActiveRecord extends ActiveRecord
{
    /**
     * @return string
     */
    protected function getSessionSalt()
    {
        return md5(static::className() . \Yii::$app->user->getID());
    }

    /**
     * Save all current attributes to session with salt as prefix.
     *
     * @return void
     */
    public function sessionSaveAttributes()
    {
        foreach ($this->getAttributes() as $sKey => $sAttribute) {
            \Yii::$app->session->set($this->getSessionSalt() . '_' . $sKey, $this->getAttribute($sKey));
        }
    }

    /**
     * Apply all attributes to model if they exist.
     *
     * @return void
     */
    public function sessionLoadAttributes()
    {
        foreach ($this->getAttributes() as $sKey => $sAttribute) {
            $this->setAttribute($sKey, \Yii::$app->session->get($this->getSessionSalt() . '_' . $sKey));
        }
    }
}
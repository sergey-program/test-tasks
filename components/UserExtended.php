<?php

namespace app\components;

use yii\web\User;

/**
 * Class UserExtended
 *
 * @package app\components
 */
class UserExtended extends User
{
    /**
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        if ($this->isGuest) {
            return false;
        }

        return \Yii::$app->authManager->checkAccess($this->getID(), $role);
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        if (!$this->isGuest) {
            $identity = $this->getIdentity();
            /** @var UserIdentity $identity */

            if ($identity) {
                return $identity->username;
            }
        }

        return null;
    }
}
<?php

namespace app\modules\base\components;

use app\modules\base\models\Usuario;

class AccessRule extends \yii\filters\AccessRule
{

    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if( empty($this->roles) )
        {
            return true;
        }
        foreach( $this->roles as $role )
        {
            if( $role == '?' )
            {
                if( $user->getIsGuest() )
                {
                    return true;
                }
            }
            elseif( !$user->getIsGuest() && $role == $user->identity->role )
            { // Check if the user is logged in, and the roles match
                return true;
            }
        }

        return false;
    }

}

<?php

namespace app\modules\base\components;

use app\modules\base\models\Usuario;

class BaseAccessRule extends \yii\filters\AccessRule
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
            elseif( $role == '@' )
            {
                if( !$user->getIsGuest() )
                {
                    return true;
                }
            }
            elseif( !$user->getIsGuest() && $role == $user->identity->papel_id )
            { // Check if the user is logged in, and the roles match
                return true;
            }
        }

        return false;
    }

}

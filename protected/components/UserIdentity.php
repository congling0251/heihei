<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
         private $_id;
	public function authenticate()
	{
             $user = HhUsers::model()->findByAttributes(array(
            'username' => $this->username,
            'password' => md5($this->password)
        ));
        //用户名或密码错误
        if(!isset($user)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        //登陆成功
        } else {      
            $this->_id = $user->userid;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
            $this->setState('username', $user->username);
            $this->setState('userid', $user->userid);
            $this->setState('safeNumber',md5(time()));
            $this->setState('loginIp',Yii::app()->request->userHostAddress);
        }
        return $this->errorCode;
	}
         public function getId()
        {
            return $this->_id;
        }
}
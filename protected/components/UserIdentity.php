<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 *date('Y-m-d h:i:s')
 */
class UserIdentity extends CUserIdentity
{
	private $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$record = BaseUser::model()->findByAttributes(array('username'=>$this->username));
	
		if($record===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if($record->password !== crypt($this->password,$this->password)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
			$this->id = $record->id;
			if(null === $record->last_login_on)
			{
				$lastLogin = time();
			}
			else
			{
				$lastLogin = strtotime($record->last_login_on);
			}
			$this->setState('lastLoginOn', $lastLogin);
			$this->errorCode=self::ERROR_NONE;
		}

	return !$this->errorCode;
	}

	public function getId()
	{
		return $this->id;
	}

}
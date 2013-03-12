<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
				array('rememberMe', 'boolean'),
		// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
                        // get the user node
                    // get user by email; 
                    $auth_user = BaseUser::model()->findByPk($this->_identity->id);
                   if(is_null($auth_user->usernode) || is_null($auth_user->locationnode)){
                       // check if node value is not set try and get node
                   $usernode = Yii::app()->mesh->getUserNodeByEmail($auth_user->email);

                    if(is_a($usernode,'NeoUser')){
                        //if the usernode is set
                        //chekc location 
                        
                     
            BaseUser::model()->updateByPk($this->_identity->id, array('last_login_on'=>new CDbExpression('NOW()'),
                                                                  'usernode'=>$usernode->getId(),
                                                                  'locationnode'=>$usernode->location->getId())); 
                    }else{
                   //redirect to start
                        	BaseUser::model()->updateByPk($this->_identity->id, array('last_login_on'=>new CDbExpression('NOW()')));
                  
                   $this->redirect('start/index');
                    }     
                    }
                   
                 
                    
                 //    $usernode = NeoUser::model()
		//	BaseUser::model()->updateByPk($this->_identity->id, array('last_login_on'=>new CDbExpression('NOW()')));
                        // update user 
                        
			return true;
		}
		else
			return false;
	}
        public function isNewUser(){
            // verifies if a user is new and deterines the page they are redirected to
        
            return false;
        }
        
}
  
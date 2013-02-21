<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function __construct($id,$module= NULL)	{
			parent::__construct($id,$module);
			
			if (Yii::app()->user->isGuest){
				$this->layout = 'home';
				
			}
			$this->onRegister(new CEvent());
			
	}
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/mahi
	
		$model=new LoginForm;
		$model2 = new RegisterForm();

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->homeUrl);
		}
		// display the login form
		$register = $this->renderpartial('register',array('model2'=>$model2 ),true);
	
		$this->render('login',array('model'=>$model,'registerform'=>$register));
		;
	}
		


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionVerify($id)
	{
		$user = BaseUser::model()->findByPk($id);

		if($user->email_verify != 1)
		{
			BaseUser::model()->updateByPk($id, array('email_verify'=>1,'updated_on'=> new CDbExpression('NOW()')));
			$flag = 1;
		}
		else
			$flag = 0;

		$this->render('verify', array(
			'user' => $user,
			'flag' => $flag,
		));
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		$model2 = new RegisterForm();

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{		
			$model->attributes=$_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				$this->redirect($this->createAbsoluteUrl('profile/index'));
			}
		}
		// display the login form

		/*$this->render('login',array('model'=>$model));
		$this->render('register',array('model2'=>$model2));*/
		$register = $this->renderpartial('register',array('model2'=>$model2 ),true);
		$this->render('login',array('model'=>$model,'registerform'=>$register));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegister(){
		/*
		 * get all registration details 
                 * registers and stores user information in database ( mysql ) 
                 *  creates a user node in neo4j with mysql unique uid as property 
                 * create a user location relationship between user and the specified location 
                 * registration complete 
                 * send a registration complete message to user
                 *
		 * 
		 */
		$model = new RegisterForm(); 
		$newUser = new BaseUser();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes = $_POST['RegisterForm'];
			if($model->validate())
			{
			// save data to database
			$regdata = array('first_name'=>$model->first_name,'last_name'=>$model->last_name,'username'=>$model->username, 'email'=>$model->email,'password'=>$model->password, 'email_verify'=>0, 'gender'=>$model->gender,'birth_date'=>$model->birth_date,'created_on'=>$model->created_on, 'last_login_on'=>$model->last_login_on, 'joinIp'=> Yii::app()->request->userHostAddress);

			$newUser->email  = $model->email;
			$newUser->password = crypt($model->password,$model->password);
			$newUser->email_verify = 0 ;
			$newUser->joinIp = Yii::app()->request->userHostAddress;
			$newUser->first_name = $model->first_name;
			$newUser->last_name = $model->last_name;
			$newUser->username = $model->username;
			$newUser->gender = $model->gender;
			$newUser->birth_date = $model->birth_date;
			$newUser->created_on = $model->created_on;
			$newUser->last_login_on = /*date('Y-m-d h:i:s');//*/ new CDbExpression('NOW()');

				if($newUser->save())
				{
	      // create neo4j user node 
	      	$newneouser = new NeoUser();
	      	$newneouser->setAttributes(array('firstname'=> $model->first_name,
	                                     'lastname'=>$model->last_name,
	                                     'email'=>$model->email,
	                                    'joinIp'=>Yii::app()->request->userHostAddress));
	       
	      	$newneouser->save();
	                       
	       // get all existing locations  based on user selected location 
	       // this should go into the preview process. 
	       //i.e on logi user first selects location 
	       // then user imports frieds  
	       //then user lands at the mesh main page
	      	$newUser->sendMail($newUser,'verification_mail');

					$this->render('home');
				 
					//$this->onRegister = array($this,'do_register');
				// 	exit();
				}
			}
			
		}
	}
	
	
	public function onRegister($event){
		$this->raiseEvent('onRegister', $event);
	}
	
	public function do_register(){
		echo ' registration done ';
		exit();
	}
	
	public function actionRetrievepassword(){
		// retrieves the password of the user
	}
}
<?php

class ProfileController extends Controller {

	/*
	 * the profile controller manages the profile page together with its components
	 */
	public function init(){
		// restrict user
		/// load all necessary profile instructions
	}

  public function actionIndex()
  {
  	$user = BaseUser::model()->findByPk(Yii::app()->user->id);
  	$profile = Profile::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));

  	if(is_null($profile))
  		$profile = new Profile;

  	$this->render('index',array('user'=>$user,'profile'=>$profile));
  }	

  public function actionAddDisplayPicture()
  {
  	$user = BaseUser::model()->findByPk(Yii::app()->user->id);
  	$profile = new Profile;

		if(isset($_POST['Profile']))
		{
    	$oldRecord = Profile::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));

    	if(is_null($oldRecord))
    	{
    		$profile->attributes = $_POST['Profile'];
    		$profile->display_picture = CUploadedFile::getInstance($profile,'display_picture');
				
				if($profile->save())
				{
					$path_to_file = Yii::app()->basePath.'/../avatars/'.$user->username.'_avatar.jpg';
					// $path_to_file = Yii::app()->basePath.'/../avatars/'.$user->username.'_avatar'.$profile->display_picture->getExtensionName();
					$profile->display_picture->saveAs($path_to_file,true);

					Yii::app()->user->setFlash('success','Avatar uploaded successfully.');

					$this->redirect(array('index'));
				}

			} else {
				$_POST['Profile']['display_picture'] = $oldRecord->display_picture;
        $oldRecord->attributes = $_POST['Profile'];
 
    		$oldRecord->display_picture = CUploadedFile::getInstance($oldRecord,'display_picture');

				if($oldRecord->update())
				{
					if(!empty($oldRecord->display_picture))
					{
						$path_to_file = Yii::app()->basePath.'/../avatars/'.$user->username.'_avatar.jpg';
						$oldRecord->display_picture->saveAs($path_to_file,true);

						Yii::app()->user->setFlash('success','Avatar changed successfully.');
						$this->redirect(array('index'));
					}
				}
			}
		}

  	$this->render('displayPicture',array('user'=>$user, 'profile'=> $profile));
  }

 public function actionInfo(){
 	/*
 	 * manages info action 
 	 * retrieve user information based on the current user 
 	 */
 	$user = Yii::app()->user->id; 
 	
 	$this->render('info');
 }

  public function actionCreateInfo()
  {
  	$profile = new Profile;
  	$profile->user_id = Yii::app()->user->id;

// This is a half working code so commented it. We'll change things here in this iteration.
/*  	if(isset($_POST['Profile']))
  	{
  		if($profile->checkForSaveOrUpdate() === null)
  		{
  			$profile->attributes = $_POST['Profile'];
  			if($profile->save())
  				Yii::app()->user->setFlash('success','Profile has been saved successfully');
  		}
  		elseif($profile = $profile->checkForSaveOrUpdate())
  		{
  			//$profile->saveAttributes($_POST['Profile']);
  			$profile->attributes = $_POST['Profile'];
  			if($profile->update())
  				Yii::app()->user->setFlash('success','Profile has been updated successfully');
  		}

  		$this->redirect(array('index'));
  	}*/

  	$this->render('createInfo',array('profile'=>$profile));
  }

  public function actionViewInfo($id)
  {
  	$profile = Profile::model()->findByPk($id);

  	$this->render('viewInfo',array('profile'=>$profile));
  }

	public function actionChangePassword()
	{

		$model = new ChangePasswordForm;

		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			if($model->validate())
			{
				$user = BaseUser::model()->findByPk(Yii::app()->user->id);
				$encryptedPassword = crypt($model->newPassword,$model->newPassword);
				$user->password = $encryptedPassword;
				if ($user->update())
				{
					Yii::app()->user->setFlash('success','Password has been changed successfully for the username: '.Yii::app()->user->name.'.<br/> You can now login using your new password<br/>' );
					$user->sendMail($user, 'password_change_mail');
					$model = new ChangePasswordForm;
				}
			}
		}

		$this->render('changePassword', array(
			'model'=>$model,
		));

	}
 
 public function actionProfessionalprofile(){
 	/*
 	 * handles all thast has to do with professional profile
 	 */
 }
 
 public function actionPhotos(){
 	/*
 	 * handles profile actions in relation to photos
 	 */
 }
 
 public function actionFavourites(){
 	
 }
 
 public function actionFriends(){
 	
 }
 
 public function actionMessage(){
 	
 }
 

}

?>
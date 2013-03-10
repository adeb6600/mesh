<?php

class ProfileController extends Controller {

	/*
	 * the profile controller manages the profile page together with its components
	 */ 
    private $profileUser ; 
    private $profileUserProfile;
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    $this->layout = 'main';
        
        
        
    }
    public function init(){
		// restrict user
		/// load all necessary profile instructions
    $this->profileUser = yii::app()->mesh->getUserNode('','adeb6600@gmail.com');
    $this->profileUserProfile = $this->profileUser->profile;
  
            }
   
        
  public function actionIndex()
  {
      // this loads all personal profile information from the neo4j database
     
      
  //	$user = BaseUser::model()->findByPk(Yii::app()->user->id);
       
     	//$profile = Profile::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
  
       
  	$this->render('index',array('user'=>$this->profileUser,
                                    'profile'=>  $this->profileUserProfile,
                                    'location'=>$this->profileUser->location, 
                                    'basic_info'=>$this->profileUserProfile->get_basic_info(), 
                                    'family'=>$this->profileUserProfile->get_family(),
                                    'contact'=>$this->profileUserProfile->get_contact(), 
                                    'relationship'=>  $this->profileUserProfile->get_relationship()));
  }	
  
  public function newDisplayPicture(){
      /*
       * adds a new profile picture to the profile 
       * 1. create a new user bucket on riak if its non-existent
       * generate a unique name for the image
       * save the image in riak 
       * store the image path under profile in neo
       */
             $profile = $this->profileUserProfile;
             
            //retrieve image from form // 
            if(isset($_POST['Profile'])){
                  
            } 
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
					// rename properly and upload to riak   
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
<?php

class ProfileController extends Controller {

	/*
	 * the profile controller manages the profile page together with its components
	 */
	public function init(){
		// restrict user
		/// load all necessary profile instructions
	}
  public function actionIndex(){

  	$this->render('index');
  }	
 public function actionInfo(){
 	/*
 	 * manages info action 
 	 * retrieve user information based on the current user 
 	 */
 	$user = Yii::app()->user->id; 
 	
 	$this->render('info');
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
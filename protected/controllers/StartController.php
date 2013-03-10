0<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartController
 * the start controller manages new registration 
 * it confirms their registration and takes them through the  getting started module system
 * action within the  start system includes 
 * landing page once registered you are transferred to the getting started module.. 
 * 
 *  
 * 
 * @author Adebanjo Inioluwa
 */
class StartController extends Controller {
    //put your code here
 private $c_req = null ; // request object
 private $pics_data = null ; // this holds the profile pics data information and for the ajax action
 private  $neoUser ;
 private $neoUserProfile; // stores the profile node of the user
 private $neoUserProfessionalProfile; // stores the professional profile of the user
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    // connect to neo4j and retrieve user nodeID
   $this->layout ='start';
        $this->c_req= yii::app()->request;
    //   $this->neoUser = new NeoUser();
      // print_r($this->neoUser);
       // find the user
       /*
        * finding the user shoudnt not be by full transversal as this would slow down retrieval 
        * the usernode should be stored as a a value of the component Mesh
        */
   //    $user_node = $this->neouser->findByExactIndexEntry('email', 'adeb6600@gmail.com'); 
        }
        
        public function init() {
            parent::init();
 // load the current user from neo4j
            
 $this->neoUser =   yii::app()->mesh->getusernode(null,'adeb6600@gmail.com'); 
      
// check if the profile has been created for this user  
   if($this->neoUser){
       // ifuser exist then load the user profile if it exist or create a new profile
     $profile = yii::app()->mesh->getUserhasProfile($this->neoUser);
        if(!$profile){
            // create new profile
            $this->neoUserProfile = new neoProfile();
                    $this->neoUserProfile->type = 'PERSONAL'; 
                    $this->neoUserProfile->save();
             //create the profile relationship between the user and the profile node
       $profilerel = new _PROFILE_();
       $profilerel->setStartNode($this->neoUser);
       $profilerel->setEndNode($this->neoUserProfile);
       $profilerel->save();
         
        // create professional profile
       $this->neoUserProfessionalProfile = new neoProfile();
     $this->neoUserProfessionalProfile->type = 'PROFESSIONAL'; 
     $this->neoUserProfessionalProfile->save();
              $profilerel = new _PROFILE_();
       $profilerel->setStartNode($this->neoUser);
       $profilerel->setEndNode($this->neoUserProfessionalProfile);
       $profilerel->save();
         
    //   
       
            }else{
                // set the profile
                $this->neoUserProfile = $profile; 
            }
        }
        }
    public function actionIndex(){
        /*
         * this is the landing page for a new registrant
         * 
         */
        $model = new Start();
     
        if($this->c_req->isAjaxRequest){
            // upload picture
            $profile_data = 'abx';
            $this->uploadprofilepics($profile_data);
        }elseif ($this->c_req->isPostRequest) {
            /*
             *
             */
           
            $model->attributes = $_POST['Start'];
      
            // get user node graph
            // save the display name to the node graph 
          $savedisplay =  $this->saveDisplayName($this->neoUser, $model);
            
          if($savedisplay){
              $this->redirect(array('start/personalprofile'));
          }  else {
              $this->redirect('start/index');
              
          }
           
            
        }
        
        
        $this->render('index',array('model'=>$model));
       
    }
    
    public function actionPersonalProfile(){
        /*
         * saves newly created personal profile info and create the node in neo4j 
         */
             $model = new Start();
        $this->render('personalprofile',array('model'=>$model));
     if($this->c_req->isAjaxRequest){
            // upload picture
            $profile_data = 'abx';
            $this->uploadprofilepics($profile_data);
        }elseif ($this->c_req->isPostRequest) {
            /*
             *
             */
            
           
            $model->attributes = $_POST['Start'];
      
            // save about me 
            $mydescription = $this->saveAboutMe($this->neoUser, $model);
            
            if($mydescription){
            $this->redirect(array('start/professionalprofile'));
                // if my description is saved      $this->redirect(array('start/personalprofile'));
          }  else {
              $this->redirect('start/index');
              ; 
            }
        }
      
    }
    
  
    public function actionSkip(){
        
        /*
         * this function skips all start profile... 
         */
    }
    public function actionProfessionalProfile(){
          /*
         * saves newly created professional profile info and create the node in neo4j 
         */
 //      
        $model = new Start();
            if($this->c_req->isPostRequest){
        $model->attributes = $_POST['Start'];
            
            $professionalprofile = $this->saveProfessional($this->neoUser, $model);
        if($professionalprofile){
            $this->redirect(array('profile/index'));
                // if my description is saved      $this->redirect(array('start/personalprofile'));
          }  else {
              $this->redirect('start/index');
              ; 
            }
            }
            $this->render('professionalprofile',array('model'=>$model));
       
    }
    
    public function actionAboutMe(){
        
    }
    
   
    public function actionUploadProfilePics(){
        Yii::import('ext.riak.*');
        $model = new Start();
        
        $file = CUploadedFile::getInstance($model, 'display_picture'); 
      /* $client = new Riiak('ec2-184-72-184-220.compute-1.amazonaws.com' ,'8098');
        $bucket = $client->bucket('profile');
        $profile_pics = $bucket->newObject('1235', array(
            'image'=>$file->getName(),
        ));
        
        $profile_pics->setContentType('image/jpg');
         $path_to_file = Yii::app()->basePath.'/../avatars/'.'dp.jpg';
      //   if($file->saveAs($path_to_file)){
        $profile_pics->setData($file->getTempName());
        
            $profile_pics->store();
         //}
	//$profile_pics->setData($file->sa());
     $data = $profile_pics->getData() ;
     print_r($data);
       */
        // save inside amazon S3
       
        $success = Yii::app()->s3->upload($file->getTempName(), $file->getName(),'meshtrial');
        print_r($success);
    yii::app()->end();
      
        if($this->uploadprofilepics()){ // if profile pics successfully stored to riak
       // update current_profile link on user nod
            $this->neouser->current_profile  = $this->pics_data;
            $this->neouser->save();
            }; 
        return true;
        
    }
    
    private function saveDisplayName(NeoUser $user , $display_name){
  // using the supplied usernode retrieve the profile node 
        $this->neoUser = $user;
   // retrieve user profile 
       if(!$this->neoUserProfile){
           $this->neoUserProfile = $this->neoUser->profile();
       } 
   $this->neoUserProfile->setAttributes(array('display_name'=>$display_name->display_name, 'hometown'=>$display_name->hometown));
          if($this->neoUserProfile->save()){
            return true;
            }else{
            return false;  
            }
        
    }
    
   private function saveAboutMe(Neouser $user , $aboutme){
       
       // restrict about me to 100 words
       
        $this->neoUser = $user;
   // retrieve user profile 
       if(!$this->neoUserProfile){
           $this->neoUserProfile = $this->neoUser->profile();
       } 
   $this->neoUserProfile->setAttributes(array('about_me'=>$aboutme->aboutme));
          if($this->neoUserProfile->save()){
            return true;
            }else{
            return false;  
            }
       
   }
   private function saveProfessional(NeoUser $user ,$pro){
        // createst a new profile node with type professional 
    //   and save details to it
        $this->neoUser = $user;
       
   // retrieve user profile 
       if(!$this->neoUserProfessionalProfile){
           $this->neoUserProfessionalProfile = $this->neoUser->professionalprofile;
       
       } 
   $this->neoUserProfessionalProfile[0]->setAttributes(array('education'=>$pro->education, 
                                                 'coursework'=>$pro->coursework,
                                                 'company'=>$pro->position,
                                                 'experience'=>$pro->experience));
          if($this->neoUserProfessionalProfile[0]->save()){
            return true;
            }else{
            return false;  
            }
       
        }
        private function uploadprofilepics(){
            
            return true;
        }
}
?>
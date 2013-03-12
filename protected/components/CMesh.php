<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CMesh
 *
 * @author Adebanjo Inioluwa
 */
class CMesh extends CApplicationComponent {
    //put your code here
    /*
     * this component initiates the connection to the Mesh Graph database a
     * and provides a mesh a  mesh Handle that can be used to call all function 
     * it loads a 
     */
    
    private $Mesh ; // this component 
    private $usernode ;
    public function __construct() {
         ;
    // set mesh value
        
    }
    public function getMesh(){
        
      // get mesh miust always return mesh
        if(!$this->mesh){
            //if mesh is not an object
       $mesh = new NeoMesh();
       $this->mesh = NeoMesh::model()->findByExactIndexEntry('name','Mesh');
       return $this->mesh;
        }else{
        return $this->Mesh;
        }
    }
    
   public function getUserNode($nodeid=null){
       /*
        * //
        * This uses the Mesh Neo object to retrieve the users node
        */
       
       
       if(is_null($nodeid)){ // if node id isnt set
       
       // checkif user is loggedin 
           if(Yii::app()->user->isGuest){
          //     $this->raiseEvent ($name, $event)
               Yii::app()->user->setFlash('login_message','Please Login');
               Yii::app()->controller->redirect (Yii::app()->controller->createAbsoluteUrl ('site/index'));// this should be changed to an event in the future
           } 
           $theuser = BaseUser::model()->findByPk(Yii::app()->user->id);
         
           $this->usernode = NeoUser::model()->findByAttributes(array('email'=> $theuser->email));
           
           return $this->usernode;
           }else{
           $this->usernode = NeoUser::model()->findbyId(intval($nodeid));
      
               return $this->usernode;
       }
       
   }
   
   public function getUserNodeByEmail($nodemail=  null){
       /*
        * //
        * This uses the Mesh Neo object to retrieve the users node
        */
       
       
       if(is_null($nodemail)){ // if node id isnt set
           
       // checkif user is loggedin 
           if(Yii::app()->user->isGuest){
          //     $this->raiseEvent ($name, $event)
               Yii::app()->user->setFlash('login_message','Please Login');
               Yii::app()->controller->redirect (Yii::app()->controller->createAbsoluteUrl ('site/index'));// this should be changed to an event in the future
           } 
           $this->usernode = $newnode->findByAttributes(array('email'=>  Yii::app()->user->id));
           return $this->usernode;
           }else{
           $this->usernode = NeoUser::model()->findbyAttributes(array('email'=>$nodemail));
           
      
               return $this->usernode;
       }
       
   }
   
   public function setUserNode($value){
       //$value should be an object
       $this->usernode = $value;
   }
   
   public function getUserhasProfile(ENeo4jNode $usernode){
       
       // takes a user profileand checks 
       
  
       if($usernode->profile){
          // if there exist a user profile
           return $usernode->profile;
       }else{
           return false;
       }
   }
   
}

?>

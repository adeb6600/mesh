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
       $this->mesh = $mesh->findById('6');
       return $this->mesh;
        }else{
        return $this->Mesh;
        }
    }
    
   public function getUserNode($nodeid=null,$email){
       /*
        * This uses the Mesh Neo object to retrieve the users node
        */
       
       
       if(!$nodeid){ // if node id isnt set
           
           
    
       
           $newnode = new NeoUser() ; 
       
           $this->usernode = $newnode->findByAttributes(array('email'=>$email));
           return $this->usernode;
           }else{
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

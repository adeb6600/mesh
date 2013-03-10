<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FriendController
 *
 * @author Toshiba
 */
class FriendController extends Controller {
    //put your code here
    public $layout= 'main';
   private $friendUser ;// holds the user node for the friends module     
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }
    
    
      public function init(){
		// restrict user
		/// load all necessary profile instructions
    $this->friendUser = yii::app()->mesh->getUserNode('','adeb6600@gmail.com');
//    $this->profileUserProfile = $this->profileUser->profile;
  
            }
   
    public function actionIndex(){
        /*
         * loads the initial friends page
         * 
         */
        // retriev my friends
        $friends = $this->friendUser->friends;
     
        $mutualfriends = $this->friendUser->mutualFriends;
        
        $this->render('index',  array('friends'=>$friends,
                                      'mutual_friends'=>$mutualfriends));
        
  /*
   * this practically list
   */      
        
    }
    
    public function actionView(){
        /*
         * this function allows you to view a particular friend detail
         * filters by name
         * 
         */
        $id = yii::app()->request->getParam('id'); 
        
        //return the user 
        $the_friend = NeoUser::model()->findById($id);
        return $the_friend;
        //$query = new EGremlinScript();
  //      $query->setQuery('x=[],g.v(9).')
        
    }
    public function actionSearch(){
        // searches through the friends graph
        $school = Yii::app()->request->getParam('school');
        $network = Yii::app()->request->getParam('network');
        $email = Yii::app()->request->getParam('email');
                $friends = $this->friendUser->friends;
     
      $result = $this->friendUser->searchFriends($school,$network, $email);
      
      $this->render('search',array('friends_result'=>$result ,
          'friends'=>$friends));
    }
}

?>

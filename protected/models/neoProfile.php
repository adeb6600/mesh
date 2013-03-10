<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of neoProfile
 *
 * @author Toshiba
 */
class neoProfile extends ENeo4jNode {
    //put your code here
    
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function properties()
	{
		return CMap::mergeArray(parent::properties(),array(
				
                    // all profie properties
			'type'=>array('type'=>'string'),
			'display_name'=>array('type'=>'string'),
                        'hometown'=>array('type'=>'string'),
                        'display_picture'=>array('type'=>'string'),
                        
		));
	}
	
	public function rules()
	{
		return array(
				array('type , display_name ,hometown','safe'),
					);
	}
	
	public function traversals()
	{
		return array(   
                                'user'=> array(self::HAS_ONE,self::NODE,'in("PROFILE")'),
                           
                		);
	}
        
        public function get_basic_info(){
            // retrieves the basic info of the user profile
            // gget the user,get the info ,format the info and return
            
            return array('dob'=>'May 16, 1986',
                         'university'=>'Obafemi Awolowo University',
                         'degree'=>'Physics',
                         'relationship'=>'none');
        }
        
        public function get_contact(){
            // retrieves the contact of the user
            return array('email'=>'adeb6600@gmail.com',
                         'alt_email'=>'yamtell67@yahoo.co.uk',
                         'im'=>array('skype'=>'varens001'),
                         'mobile'=>'08062979940');
            
        }
        
        public function get_family(){
            //retrieves all
         return array('adeb6600'=>array('name'=>'Adebanjo inioluwa',
                                         'rel_type'=>'brother',
                                         'pic_url'=>'http://xyz'),
                      'adeb5700'=>array('name'=>'Adebanjo inioluwa',
                                         'rel_type'=>'brother',
                                         'pic_url'=>'http://xyz'),
                      'adeb6800'=>array('name'=>'Adebanjo inioluwa',
                                         'rel_type'=>'brother',
                                         'pic_url'=>'http://xyz'),
                                            );   
        }
        
        public function get_relationship(){
         return array();   
        }
   
}

?>

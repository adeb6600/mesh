<?php
class NeoUser extends ENeo4jNode {
 
     const NODEUSER='NeoUser';
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function properties()
	{
		return CMap::mergeArray(parent::properties(),array(
				
                            	'firstname'=>array('type'=>'string'),
				'lastname'=>array('type'=>'string'),
				'email'=>array('type'=>'string'),
                                'alternate_email'=>array('type'=>'string'),
                                'phone_number'=>array('type'=>'string'),
                                'dob'=>array('type'=>'string'),
                                'im'=>array('type'=>'string'),
                                'gender'=>array('type'=>'string'),
				'joinIp'=>array('type'=>'string'),
                    
		));
	}
	
	public function rules()
	{
		return array(
				array('firstname , lastname , email ','safe'),
				array('firstname , lastname ,email','required')
		);
	}
	
	public function traversals()
	{
		return array(   
                                'mesh'=> array(self::HAS_ONE,self::NODE,'out("NETWORK_OF")'),
                                'location'=>array(self::HAS_ONE,  self::NODE,'out("LOCATION")'),
                                
                                'profile'=>array(self::HAS_ONE, self::NODE,'inE("_PROFILE_").outV.filter{it.type=="PERSONAL"}'),
                                'professionalprofile'=>array(self::HAS_MANY, self::NODE,'inE("_PROFILE_").outV.filter{it.type=="PROFESSIONAL"}'),
				'friends'=>array(self::HAS_MANY,self::NODEUSER,'both("_FRIEND_")'),
                                'mutualFriends'=>array(self::HAS_MANY,self::NODE,'out("_FRIEND_")'),
                                'fof'=>array(self::HAS_MANY,self::NODE,'out("_FRIEND_").out("_FRIEND_")'),  
				'oldFriends'=>array(self::HAS_MANY,self::NODE,'outE("_FRIEND_").filter{it.forYears>5}.inV'),
		);
	}
        
     public function searchFriends($school=null, $network=null, $email=null){
         /*
          * returns friends variables as array/ json
          *  sorts through user friend nodes 
          */
         
         $d_query = new EGremlinScript();
       $network ='Corpus Christi';
       $id =9;
         if(!$network==null){
             // set network to current network
             $network = 'Corpus Christi';// change the value to reflect a set
         
             $query = sprintf("g.v(6).in().filter{it.location=='%s'}.in().filter{it.id==%s}.both('_FRIEND_')",$network ,$id);
         //echo $query;         exit();   
          
         }
         if(!$school==null){
             //if school aint null
             $query = sprintf("g.v(6).in().filter{it.location=='%s'}.in().filter{it.id==%s}.both('_FRIEND_)",$network ,$id);
        
             
         }
         
        if(!$email==NULL){
            $query = sprintf("g.v(6).in().filter(it.location=='%s'}.in().filter{it.id==%s}.both('_FRIEND_)",$network ,$id);
        
        }
        
     
        $d_query->setQuery($query);
    //  $query->setParam('startNode',$this->id);
    $response=$this->getConnection()->queryByGremlin($d_query);    
    $data = $response->getData();
    $friends= array();
    foreach ($data as $friend){
       // set the data value according the user id
        // get the id first 
        $id = $this->extract_id( $friend['self']);
        // push the data using the ID as key 
    $friends[$id] = $friend['data'];;
        
    }
    
    return $friends;
     }
     
     private function extract_id($self_id){
         
          $uri=$self_id;
        $explodedUri=explode('/',$uri);
        return (int)end($explodedUri);
     }
}
?>
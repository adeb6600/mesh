<?php
class neoLocation extends ENeo4jNode {

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function properties()
	{
		return CMap::mergeArray(parent::properties(),array(
				
				'country'=>array('type'=>'string'),
				'state'=>array('type'=>'string'),
				'city'=>array('type'=>'string'),
				'latlong'=>array('type'=>'string'),
                                'location'=>array('type'=>'string'),
			        
                                
		));
	}
	
	public function rules()
	{
		return array(
				array('country , state , city , latlong , location','safe'),
				);
	}
	
	public function traversals()
	{
		return array(   
                                'mesh'=> array(self::HAS_ONE,self::NODE,'out("NETWORK_OF")'),
                                'users'=>array(self::HAS_MANY,  self::NODE,' in("LOCATION")'),
                );
	}
}
?>
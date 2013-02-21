<?php
class NeoUser extends ENeo4jNode {

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
				'friends'=>array(self::HAS_MANY,self::NODE,'out("_FRIEND_")'),
				'fof'=>array(self::HAS_MANY,self::NODE,'out("_FRIEND_").out("_FRIEND_")'),  
				'oldFriends'=>array(self::HAS_MANY,self::NODE,'outE("_FRIEND_").filter{it.forYears>5}.inV'),
		);
	}
}
?>
<?php
class NeoMesh extends ENeo4jNode {

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function properties()
	{
		return CMap::mergeArray(parent::properties(),array(
				
				'name'=>array('type'=>'string'),
				
		));
	}
	
	public function rules()
	{
		return array(
				array('name','safe'),
					);
	}
	
	public function traversals()
	{
		return array(   
                                'network'=> array(self::HAS_MANY,self::NODE,'in("NETWORK_OF")'),
				'user'=>array(self::HAS_MANY,self::NODE,'out("_FRIEND_")'),
				);
	}
}
?>
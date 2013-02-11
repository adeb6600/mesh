<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of neolocation
 *
 * @author USER
 */
class MESH_LOCATION extends ENeo4jRelationship  {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function properties()
    {
        return CMap::mergeArray(parent::properties(),array(
            'country'=>array('type'=>'string'),
            'name'=>array('type'=>'string'),
            'zone'=>array('type'=>'string'),
            'uid'=>array('type'=>'integer'),
        ));
    }

    public function rules()
    {
        return array(
            array('country, name , zone ,uid','safe'),
    
        );
    }
}

?>

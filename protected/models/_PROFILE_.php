<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * This defines a  profile relation binding a profile node to the profile user
 * @author Adebanjo Inioluwa
 */
class _PROFILE_ extends ENeo4jRelationship {
    //put your code here
     public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function properties()
    {
        return CMap::mergeArray(parent::properties(),array(
            'type'=>array('type'=>'string'),
        
        ));
    }

    public function rules()
    {
        return array(
            array('type','safe'),
    
        );
    }
}

?>

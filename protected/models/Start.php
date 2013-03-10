<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartIndex
 *
 * @author Toshiba
 */
class Start extends CFormModel {
    //put your code here
    
    public $display_name;
    
    public $hometown ;
    
    public $aboutme ;
    
    public $display_picture;
    
    public  $education;
    
    public $coursework;
    
    public $company;
    
    public $position;
    
    public $experience;
    
    
    	public function rules()
	{
		return array(

			array('display_name , hometown, aboutme , display_picture, education ,coursework company position experience', 'safe'),
                        array('display_picture','file','allowEmpty'=>true,'types'=>'jpg ,gif, jpeg, png')
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'display_name'=>'Display Name',
		);
	}
        
        public function getSchools(){
            // retrives shools for the education array
            return array('Texas_A_M'=>'Texas A&M University', 'MIT'=>'MAssachusset Institute of Technology');
        }

    }

?>

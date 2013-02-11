<?php

class RegisterForm extends CFormModel {
	
	public $firstname; 
	public $lastname;
	public $email;
	public $password;
	public $cpassword;
	
	
	public function rules()
	{
		return array(
				// username and password are required
				array('email, password , firstname , lastname cpassword', 'required'),
				// rememberMe needs to be a boolean
				);
	}
	
	
}

?>
<?php

class RegisterForm extends CFormModel {
	
	public $first_name; 
	public $last_name;
	public $username;
	public $email;
	public $email_verify;
	public $password;
	public $cpassword;
	public $gender;
	public $joinIp;
	public $month;
	public $bdate;
	public $year;
	public $birth_date;	
	public $created_on;
	public $last_login_on;
	
	public function rules()
	{
		return array(
			// username and password are required
			array('first_name, last_name, username, password, email', 'required'),
			array('email_verify', 'numerical', 'integerOnly'=>true),
			// array('password','compare'),
			// array('cpassword','compare','compareAttribute'=>'password'),
			array('first_name, last_name, username, password, email, gender, joinIp', 'length', 'max'=>128),
			array('bdate, month, year, birth_date, joinIp, created_on, updated_on, last_login_on', 'safe'),
			// rememberMe needs to be a boolean
		);
	}

	public function getDates()
	{
		$daysArray = array();
		for ($i=0; $i<31; $i++)
		{
			$daysArray[$i+1] = $i+1;
		}
		return $daysArray;
	}
	
	public function getMonthNames()
	{
		return array('January'=>'January','February'=>'February','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December');
	}
	
	public function getValidYears()
	{
		$yearArray = array();
    for($i=(strftime("%Y", time())-6); $i>=1901; $i--)
		{
			$yearArray[$i] = $i;
		}
		return $yearArray;
	}

	protected function beforeValidate()
	{
		$this->created_on = new CDbExpression('NOW()');
		return parent::beforeValidate();
	}

	public function afterValidate()
	{
		parent::afterValidate();
		$dateFormat = strtotime($this->bdate." ".$this->month." ".$this->year);
		$this->birth_date = date("Y-m-d", $dateFormat);
	}

}

?>
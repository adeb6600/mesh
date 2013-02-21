<?php 
class ChangePasswordForm extends CFormModel
{
  public $password;
  public $newPassword;
  public $newPassword_repeat;

	public function rules()
	{
       return array(
           // username and password are required
           array('password, newPassword, newPassword_repeat', 'required'),
           // password needs to be authenticated
           array('password', 'verify'),
           array('newPassword_repeat','compare','compareAttribute'=>'newPassword'),
		);
	}
	   
	public function attributeLabels()
	{
		return array(
			'password' => 'Current Password',
			'newPassword' => 'New Password',
			'newPassword_repeat' => 'Repeat New Password'
		);
	}
	
	public function verify()
	{
		$user = BaseUser::model()->findByPk(Yii::app()->user->id);
		$encryptedPassword = crypt($this->password,$this->password);
		if ($user->password != $encryptedPassword)
		{
			$this->addError('password', 'The current password entered is incorrect.');
		}
	}
   
}
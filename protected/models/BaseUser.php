<?php

/**
 * This is the model class for table "base_user".
 *
 * The followings are the available columns in table 'base_user':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property integer $email_verify
 * @property string $birth_date
 * @property integer $gender
 * @property string $joinIp
 * @property string $created_on
 * @property string $updated_on
 * @property string $last_login_on
 */
class BaseUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseUser the static model class
	 */

	public $bdate;
	public $month;
	public $year;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'base_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
      array('first_name, last_name, password, email, joinIp, created_on, last_login_on', 'required'),
      array('email_verify', 'numerical', 'integerOnly'=>true),
      array('first_name, last_name, password, email, gender, joinIp', 'length', 'max'=>128),
      array('birth_date, updated_on', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, first_name, last_name, password, email, email_verify, birth_date, gender, joinIp, created_on, updated_on, last_login_on', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
     'id' => 'ID',
      'first_name' => 'First Name',
      'last_name' => 'Last Name',
      'password' => 'Password',
      'email' => 'Email',
      'email_verify' => 'Email Verify',
      'birth_date' => 'Birth Date',
      'gender' => 'Gender',
      'joinIp' => 'Join Ip',
      'created_on' => 'Created On',
      'updated_on' => 'Updated On',
      'last_login_on' => 'Last Login On',
    );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

    $criteria->compare('id',$this->id);
    $criteria->compare('first_name',$this->first_name,true);
    $criteria->compare('last_name',$this->last_name,true);
    $criteria->compare('password',$this->password,true);
    $criteria->compare('email',$this->email,true);
    $criteria->compare('email_verify',$this->email_verify);
    $criteria->compare('birth_date',$this->birth_date,true);
    $criteria->compare('gender',$this->gender);
    $criteria->compare('joinIp',$this->joinIp,true);
    $criteria->compare('created_on',$this->created_on,true);
    $criteria->compare('updated_on',$this->updated_on,true);
    $criteria->compare('last_login_on',$this->last_login_on,true);

    return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
    ));
	}
public function isNewUser(){
    /*
     * this function validates if the user is a new user in order to determine the direction the user is pointed to
     */
    return false;
}
	public function sendMail($user,$purpose)
	{
		if($purpose == 'verification_mail')
			$verifyLink = Yii::app()->createAbsoluteUrl('site/verify',array('id'=>$user->id));

    $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
    $mailer->IsSMTP();
    $mailer->IsHTML(true);
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = "ssl";
    $mailer->Host = "email-smtp.us-east-1.amazonaws.com";
    $mailer->Port = 465;
    $mailer->Username = "info@meshness.com";
    $mailer->Password = "35er43de";
    $mailer->From = "info@meshness.com";
    $mailer->FromName = "Mesh Team";
    $mailer->AddAddress($user->email);

    if($purpose == 'verification_mail')
    {
    	$mailer->Subject = "Your Mesh Registration";
    	$mailer->Body = "Hi,<br/> We are glad to see you on Mesh.  <br/>Welcome to Mesh... Start Living!<br/><br/>
    		<a href=\"{$verifyLink}\">Click To activate your account</a><br/>
    		 Login with your <br/> Username: \"{$user->email}\"";
    } else if ($purpose == 'password_change_mail') {
    	$mailer->Subject = "Your Password has been changed";
    	$mailer->Body = "Hello {$user->first_name},<br/> This is just a notification to let you know that you have changed your password.<br/><br/>
    		Thanks,<br/> Mesh Team.";
    }

    if(!$mailer->Send()) {
    	return false;
  	}
	}

}
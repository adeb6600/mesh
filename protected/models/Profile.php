<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $bachelors_education
 * @property string $bachelors_education_from
 * @property string $bachelors_education_to
 * @property string $masters_education
 * @property string $masters_education_from
 * @property string $masters_education_to
 * @property string $display_picture
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $mobile_phone
 * @property string $skype_name
 * @property string $mission_statement
 * @property string $company_name
 * @property string $company_location
 * @property string $company_desingation
 * @property string $company_name_from
 * @property string $company_name_to
 * @property string $company_notes
 * @property string $prev_company_name
 * @property string $prev_company_desingation
 * @property string $prev_company_from
 * @property string $prev_company_to
 * @property string $prev_company_notes
 */
class Profile extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Profile the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'profile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('user_id', 'numerical', 'integerOnly'=>true),
            array('display_picture', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
            array('bachelors_education, masters_education, city, state, country, mobile_phone, skype_name, company_name, company_location, company_desingation, company_notes, prev_company_name, prev_company_desingation, prev_company_notes', 'length', 'max'=>128),
            array('display_picture, mission_statement', 'length', 'max'=>256),
            array('bachelors_education_from, bachelors_education_to, masters_education_from, masters_education_to, company_name_from, company_name_to, prev_company_from, prev_company_to', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, bachelors_education, bachelors_education_from, bachelors_education_to, masters_education, masters_education_from, masters_education_to, display_picture, city, state, country, mobile_phone, skype_name, mission_statement, company_name, company_location, company_desingation, company_name_from, company_name_to, company_notes, prev_company_name, prev_company_desingation, prev_company_from, prev_company_to, prev_company_notes', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO,'BaseUser','user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'bachelors_education' => 'Bachelors Education',
            'bachelors_education_from' => 'Bachelors Education From',
            'bachelors_education_to' => 'Bachelors Education To',
            'masters_education' => 'Masters Education',
            'masters_education_from' => 'Masters Education From',
            'masters_education_to' => 'Masters Education To',
            'display_picture' => 'Display Picture',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'mobile_phone' => 'Mobile Phone',
            'skype_name' => 'Skype Name',
            'mission_statement' => 'Mission Statement',
            'company_name' => 'Company Name',
            'company_location' => 'Company Location',
            'company_desingation' => 'Company Desingation',
            'company_name_from' => 'Company Name From',
            'company_name_to' => 'Company Name To',
            'company_notes' => 'Company Notes',
            'prev_company_name' => 'Prev Company Name',
            'prev_company_desingation' => 'Prev Company Desingation',
            'prev_company_from' => 'Prev Company From',
            'prev_company_to' => 'Prev Company To',
            'prev_company_notes' => 'Prev Company Notes',
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
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('bachelors_education',$this->bachelors_education,true);
        $criteria->compare('bachelors_education_from',$this->bachelors_education_from,true);
        $criteria->compare('bachelors_education_to',$this->bachelors_education_to,true);
        $criteria->compare('masters_education',$this->masters_education,true);
        $criteria->compare('masters_education_from',$this->masters_education_from,true);
        $criteria->compare('masters_education_to',$this->masters_education_to,true);
        $criteria->compare('display_picture',$this->display_picture,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('mobile_phone',$this->mobile_phone,true);
        $criteria->compare('skype_name',$this->skype_name,true);
        $criteria->compare('mission_statement',$this->mission_statement,true);
        $criteria->compare('company_name',$this->company_name,true);
        $criteria->compare('company_location',$this->company_location,true);
        $criteria->compare('company_desingation',$this->company_desingation,true);
        $criteria->compare('company_name_from',$this->company_name_from,true);
        $criteria->compare('company_name_to',$this->company_name_to,true);
        $criteria->compare('company_notes',$this->company_notes,true);
        $criteria->compare('prev_company_name',$this->prev_company_name,true);
        $criteria->compare('prev_company_desingation',$this->prev_company_desingation,true);
        $criteria->compare('prev_company_from',$this->prev_company_from,true);
        $criteria->compare('prev_company_to',$this->prev_company_to,true);
        $criteria->compare('prev_company_notes',$this->prev_company_notes,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    protected function beforeValidate()
    {
        if( $this->isNewRecord )
        {
            $this->user_id = Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }

    public function getDisplayPicturePath()
    {
        if(isset($this->display_picture))
            return Yii::app()->request->baseUrl.'/avatars/'.$this->user->username.'_avatar.jpg';
        else
            return Yii::app()->request->baseUrl.'/avatars/no_image.jpg';
    }

    public function checkForSaveOrUpdate()
    {
        return self::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
    }
}
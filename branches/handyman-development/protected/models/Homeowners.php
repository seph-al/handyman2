<?php

/**
 * This is the model class for table "homeowners".
 *
 * The followings are the available columns in table 'homeowners':
 * @property integer $homeowner_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $username
 * @property string $phone_number
 * @property string $password
 * @property string $date_registered
 * @property string $photo
 */
class Homeowners extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Homeowners the static model class
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
		return 'homeowners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username', 'required'),
			array('firstname, lastname, email, username, phone_number, password, photo', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('homeowner_id, firstname, lastname, email, username, phone_number, password, date_registered, photo', 'safe', 'on'=>'search'),
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
			'homeowner_id' => 'Homeowner',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'username' => 'Username',
			'phone_number' => 'Phone Number',
			'password' => 'Password',
			'date_registered' => 'Date Registered',
			'photo' => 'Photo',
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

		$criteria->compare('homeowner_id',$this->homeowner_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date_registered',$this->date_registered,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
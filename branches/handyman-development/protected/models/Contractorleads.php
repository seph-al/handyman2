<?php

/**
 * This is the model class for table "contractorleads".
 *
 * The followings are the available columns in table 'contractorleads':
 * @property integer $Id
 * @property string $ProjectType
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Phone
 * @property string $AlternatePhone
 * @property string $Email
 * @property string $StreetAddress
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property string $SquareFoot
 * @property string $Budget
 * @property string $ProjectDetails
 * @property string $ProjectReason
 * @property string $Start
 * @property string $Age
 * @property integer $IsOwn
 * @property string $TimeToContact
 * @property integer $IsFinancing
 * @property string $IpAddress
 * @property integer $IsFreePage
 * @property string $Affiliate
 * @property string $MyPageAffiliate
 * @property integer $IsSentToRenovExperts
 * @property string $Created
 */
class Contractorleads extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contractorleads the static model class
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
		return 'contractorleads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Created', 'required'),
			array('IsOwn, IsFinancing, IsFreePage, IsSentToRenovExperts', 'numerical', 'integerOnly'=>true),
			array('ProjectType', 'length', 'max'=>125),
			array('Firstname, Lastname, Email', 'length', 'max'=>150),
			array('Phone, AlternatePhone', 'length', 'max'=>30),
			array('StreetAddress, ProjectReason, TimeToContact', 'length', 'max'=>200),
			array('City, Affiliate, MyPageAffiliate', 'length', 'max'=>75),
			array('State', 'length', 'max'=>10),
			array('Zip', 'length', 'max'=>15),
			array('SquareFoot', 'length', 'max'=>25),
			array('Budget', 'length', 'max'=>70),
			array('ProjectDetails', 'length', 'max'=>400),
			array('Start', 'length', 'max'=>100),
			array('Age', 'length', 'max'=>50),
			array('IpAddress', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, ProjectType, Firstname, Lastname, Phone, AlternatePhone, Email, StreetAddress, City, State, Zip, SquareFoot, Budget, ProjectDetails, ProjectReason, Start, Age, IsOwn, TimeToContact, IsFinancing, IpAddress, IsFreePage, Affiliate, MyPageAffiliate, IsSentToRenovExperts, Created', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'ProjectType' => 'Project Type',
			'Firstname' => 'Firstname',
			'Lastname' => 'Lastname',
			'Phone' => 'Phone',
			'AlternatePhone' => 'Alternate Phone',
			'Email' => 'Email',
			'StreetAddress' => 'Street Address',
			'City' => 'City',
			'State' => 'State',
			'Zip' => 'Zip',
			'SquareFoot' => 'Square Foot',
			'Budget' => 'Budget',
			'ProjectDetails' => 'Project Details',
			'ProjectReason' => 'Project Reason',
			'Start' => 'Start',
			'Age' => 'Age',
			'IsOwn' => 'Is Own',
			'TimeToContact' => 'Time To Contact',
			'IsFinancing' => 'Is Financing',
			'IpAddress' => 'Ip Address',
			'IsFreePage' => 'Is Free Page',
			'Affiliate' => 'Affiliate',
			'MyPageAffiliate' => 'My Page Affiliate',
			'IsSentToRenovExperts' => 'Is Sent To Renov Experts',
			'Created' => 'Created',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('ProjectType',$this->ProjectType,true);
		$criteria->compare('Firstname',$this->Firstname,true);
		$criteria->compare('Lastname',$this->Lastname,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('AlternatePhone',$this->AlternatePhone,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('StreetAddress',$this->StreetAddress,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('Zip',$this->Zip,true);
		$criteria->compare('SquareFoot',$this->SquareFoot,true);
		$criteria->compare('Budget',$this->Budget,true);
		$criteria->compare('ProjectDetails',$this->ProjectDetails,true);
		$criteria->compare('ProjectReason',$this->ProjectReason,true);
		$criteria->compare('Start',$this->Start,true);
		$criteria->compare('Age',$this->Age,true);
		$criteria->compare('IsOwn',$this->IsOwn);
		$criteria->compare('TimeToContact',$this->TimeToContact,true);
		$criteria->compare('IsFinancing',$this->IsFinancing);
		$criteria->compare('IpAddress',$this->IpAddress,true);
		$criteria->compare('IsFreePage',$this->IsFreePage);
		$criteria->compare('Affiliate',$this->Affiliate,true);
		$criteria->compare('MyPageAffiliate',$this->MyPageAffiliate,true);
		$criteria->compare('IsSentToRenovExperts',$this->IsSentToRenovExperts);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
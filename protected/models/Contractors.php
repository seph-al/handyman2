<?php

/**
 * This is the model class for table "contractors".
 *
 * The followings are the available columns in table 'contractors':
 * @property integer $ContractorId
 * @property string $Name
 * @property string $ContactName
 * @property string $Phone
 * @property string $Fax
 * @property string $Address1
 * @property string $Address2
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property string $Email
 * @property string $Website
 * @property string $AboutBusiness
 * @property string $Services
 * @property integer $IsJoinNetwork
 * @property integer $IsFreeMypage
 * @property string $Created
 * @property string $Username
 * @property string $Password
 * @property integer $ProjectTypeId
 */
class Contractors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contractors the static model class
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
		return 'contractors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('IsJoinNetwork, IsFreeMypage, ProjectTypeId', 'numerical', 'integerOnly'=>true),
			array('Name, ContactName, City', 'length', 'max'=>75),
			array('Phone, Fax', 'length', 'max'=>20),
			array('Address1, Address2', 'length', 'max'=>150),
			array('State', 'length', 'max'=>15),
			array('Zip', 'length', 'max'=>10),
			array('Email, Website, Username, Password', 'length', 'max'=>200),
			array('AboutBusiness, Services', 'length', 'max'=>800),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ContractorId, Name, ContactName, Phone, Fax, Address1, Address2, City, State, Zip, Email, Website, AboutBusiness, Services, IsJoinNetwork, IsFreeMypage, Created, Username, Password, ProjectTypeId', 'safe', 'on'=>'search'),
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
			'ContractorId' => 'Contractor',
			'Name' => 'Name',
			'ContactName' => 'Contact Name',
			'Phone' => 'Phone',
			'Fax' => 'Fax',
			'Address1' => 'Address1',
			'Address2' => 'Address2',
			'City' => 'City',
			'State' => 'State',
			'Zip' => 'Zip',
			'Email' => 'Email',
			'Website' => 'Website',
			'AboutBusiness' => 'About Business',
			'Services' => 'Services',
			'IsJoinNetwork' => 'Is Join Network',
			'IsFreeMypage' => 'Is Free Mypage',
			'Created' => 'Created',
			'Username' => 'Username',
			'Password' => 'Password',
			'ProjectTypeId' => 'Project Type',
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

		$criteria->compare('ContractorId',$this->ContractorId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Address1',$this->Address1,true);
		$criteria->compare('Address2',$this->Address2,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('Zip',$this->Zip,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('AboutBusiness',$this->AboutBusiness,true);
		$criteria->compare('Services',$this->Services,true);
		$criteria->compare('IsJoinNetwork',$this->IsJoinNetwork);
		$criteria->compare('IsFreeMypage',$this->IsFreeMypage);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('ProjectTypeId',$this->ProjectTypeId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "cities".
 *
 * The followings are the available columns in table 'cities':
 * @property integer $CityId
 * @property integer $StateId
 * @property string $County
 * @property string $Name
 * @property string $RewriteUrl
 * @property string $Latitude
 * @property string $Longitude
 * @property integer $Population
 * @property string $Created
 *
 * The followings are the available model relations:
 * @property States $state
 */
class Cities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cities the static model class
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
		return 'cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('StateId, County, RewriteUrl, Created', 'required'),
			array('StateId, Population', 'numerical', 'integerOnly'=>true),
			array('County, RewriteUrl', 'length', 'max'=>75),
			array('Name', 'length', 'max'=>80),
			array('Latitude, Longitude', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CityId, StateId, County, Name, RewriteUrl, Latitude, Longitude, Population, Created', 'safe', 'on'=>'search'),
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
			'state' => array(self::BELONGS_TO, 'States', 'StateId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CityId' => 'City',
			'StateId' => 'State',
			'County' => 'County',
			'Name' => 'Name',
			'RewriteUrl' => 'Rewrite Url',
			'Latitude' => 'Latitude',
			'Longitude' => 'Longitude',
			'Population' => 'Population',
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

		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('StateId',$this->StateId);
		$criteria->compare('County',$this->County,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('RewriteUrl',$this->RewriteUrl,true);
		$criteria->compare('Latitude',$this->Latitude,true);
		$criteria->compare('Longitude',$this->Longitude,true);
		$criteria->compare('Population',$this->Population);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
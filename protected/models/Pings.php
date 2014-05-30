<?php

/**
 * This is the model class for table "pings".
 *
 * The followings are the available columns in table 'pings':
 * @property integer $PingId
 * @property string $LeadType
 * @property string $Request
 * @property string $Response
 * @property string $Created
 */
class Pings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pings the static model class
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
		return 'pings';
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
			array('LeadType', 'length', 'max'=>50),
			array('Request', 'length', 'max'=>4000),
			array('Response', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PingId, LeadType, Request, Response, Created', 'safe', 'on'=>'search'),
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
			'PingId' => 'Ping',
			'LeadType' => 'Lead Type',
			'Request' => 'Request',
			'Response' => 'Response',
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

		$criteria->compare('PingId',$this->PingId);
		$criteria->compare('LeadType',$this->LeadType,true);
		$criteria->compare('Request',$this->Request,true);
		$criteria->compare('Response',$this->Response,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
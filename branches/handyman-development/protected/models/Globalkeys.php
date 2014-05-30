<?php

/**
 * This is the model class for table "globalkeys".
 *
 * The followings are the available columns in table 'globalkeys':
 * @property integer $KeyId
 * @property string $Name
 * @property string $Value
 */
class Globalkeys extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Globalkeys the static model class
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
		return 'globalkeys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Value', 'required'),
			array('Name', 'length', 'max'=>50),
			array('Value', 'length', 'max'=>1500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('KeyId, Name, Value', 'safe', 'on'=>'search'),
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
			'KeyId' => 'Key',
			'Name' => 'Name',
			'Value' => 'Value',
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

		$criteria->compare('KeyId',$this->KeyId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Value',$this->Value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
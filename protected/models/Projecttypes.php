<?php

/**
 * This is the model class for table "projecttypes".
 *
 * The followings are the available columns in table 'projecttypes':
 * @property integer $ProjectTypeId
 * @property string $Code
 * @property string $Name
 * @property integer $IsTop
 * @property integer $STID
 * @property integer $MTID
 * @property integer $OID
 */
class Projecttypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projecttypes the static model class
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
		return 'projecttypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IsTop, STID, MTID, OID', 'numerical', 'integerOnly'=>true),
			array('Code', 'length', 'max'=>35),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ProjectTypeId, Code, Name, IsTop, STID, MTID, OID', 'safe', 'on'=>'search'),
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
		   'questionCount' => array(self::STAT, 'Questions','project_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProjectTypeId' => 'Project Type',
			'Code' => 'Code',
			'Name' => 'Name',
			'IsTop' => 'Is Top',
			'STID' => 'Stid',
			'MTID' => 'Mtid',
			'OID' => 'Oid',
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

		$criteria->compare('ProjectTypeId',$this->ProjectTypeId);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('IsTop',$this->IsTop);
		$criteria->compare('STID',$this->STID);
		$criteria->compare('MTID',$this->MTID);
		$criteria->compare('OID',$this->OID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
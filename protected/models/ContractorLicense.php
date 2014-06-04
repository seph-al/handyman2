<?php

/**
 * This is the model class for table "contractor_license".
 *
 * The followings are the available columns in table 'contractor_license':
 * @property integer $license_id
 * @property integer $contractor_id
 * @property string $license_no
 * @property string $status
 * @property string $type
 * @property string $date_issued
 * @property string $info
 */
class ContractorLicense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContractorLicense the static model class
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
		return 'contractor_license';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('license_no, status, type, date_issued', 'required'),
			array('contractor_id', 'numerical', 'integerOnly'=>true),
			array('license_no, status, date_issued', 'length', 'max'=>100),
			array('type', 'length', 'max'=>200),
			array('info', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('license_id, contractor_id, license_no, status, type, date_issued, info', 'safe', 'on'=>'search'),
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
			'license_id' => 'License',
			'contractor_id' => 'Contractor',
			'license_no' => 'License No',
			'status' => 'Status',
			'type' => 'Type',
			'date_issued' => 'Date Issued',
			'info' => 'Info',
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

		$criteria->compare('license_id',$this->license_id);
		$criteria->compare('contractor_id',$this->contractor_id);
		$criteria->compare('license_no',$this->license_no,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_issued',$this->date_issued,true);
		$criteria->compare('info',$this->info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
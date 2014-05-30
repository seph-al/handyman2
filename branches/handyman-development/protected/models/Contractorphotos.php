<?php

/**
 * This is the model class for table "contractorphotos".
 *
 * The followings are the available columns in table 'contractorphotos':
 * @property integer $photo_id
 * @property integer $contractor_id
 * @property string $filename
 * @property integer $is_profile
 */
class Contractorphotos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contractorphotos the static model class
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
		return 'contractorphotos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contractor_id, is_profile', 'numerical', 'integerOnly'=>true),
			array('filename', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('photo_id, contractor_id, filename, is_profile', 'safe', 'on'=>'search'),
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
		  'contractor'    => array(self::BELONGS_TO, 'Contractors', 'contractor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'photo_id' => 'Photo',
			'contractor_id' => 'Contractor',
			'filename' => 'Filename',
			'is_profile' => 'Is Profile',
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

		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('contractor_id',$this->contractor_id);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('is_profile',$this->is_profile);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
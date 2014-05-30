<?php

/**
 * This is the model class for table "messagedeleted".
 *
 * The followings are the available columns in table 'messagedeleted':
 * @property integer $deleted_id
 * @property integer $deleted_by
 * @property integer $message_id
 * @property string $user_type
 */
class Messagedeleted extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messagedeleted the static model class
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
		return 'messagedeleted';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deleted_by, message_id', 'required'),
			array('deleted_by, message_id', 'numerical', 'integerOnly'=>true),
			array('user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('deleted_id, deleted_by, message_id, user_type', 'safe', 'on'=>'search'),
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
			'deleted_id' => 'Deleted',
			'deleted_by' => 'Deleted By',
			'message_id' => 'Message',
			'user_type' => 'User Type',
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

		$criteria->compare('deleted_id',$this->deleted_id);
		$criteria->compare('deleted_by',$this->deleted_by);
		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('user_type',$this->user_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
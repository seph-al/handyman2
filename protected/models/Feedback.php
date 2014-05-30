<?php

/**
 * This is the model class for table "feedback".
 *
 * The followings are the available columns in table 'feedback':
 * @property integer $feedback_id
 * @property string $message
 * @property integer $contractor_id
 * @property integer $homeowner_id
 * @property string $date_posted
 */
class Feedback extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Feedback the static model class
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
		return 'feedback';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contractor_id, homeowner_id', 'numerical', 'integerOnly'=>true),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('feedback_id, message, contractor_id, homeowner_id, date_posted', 'safe', 'on'=>'search'),
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
		    'homeowner'    => array(self::BELONGS_TO, 'Homeowners', 'homeowner_id'),
		    'contractor'    => array(self::BELONGS_TO, 'Contractors', 'contractor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'feedback_id' => 'Feedback',
			'message' => 'Message',
			'contractor_id' => 'Contractor',
			'homeowner_id' => 'Homeowner',
			'date_posted' => 'Date Posted',
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

		$criteria->compare('feedback_id',$this->feedback_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('contractor_id',$this->contractor_id);
		$criteria->compare('homeowner_id',$this->homeowner_id);
		$criteria->compare('date_posted',$this->date_posted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
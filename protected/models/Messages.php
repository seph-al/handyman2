<?php

/**
 * This is the model class for table "messages".
 *
 * The followings are the available columns in table 'messages':
 * @property integer $message_id
 * @property string $subject
 * @property string $message
 * @property integer $from_id
 * @property string $from_user_type
 * @property integer $to_id
 * @property string $to_user_type
 * @property string $date_sent
 * @property integer $read
 */
class Messages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messages the static model class
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
		return 'messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, message, from_id, from_user_type, to_id, to_user_type', 'required'),
			array('from_id, to_id, read', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>200),
			array('from_user_type, to_user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('message_id, subject, message, from_id, from_user_type, to_id, to_user_type, date_sent, read', 'safe', 'on'=>'search'),
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
		   'hfrom'    => array(self::BELONGS_TO, 'Homeowners', 'from_id'),
		   'cfrom'    => array(self::BELONGS_TO, 'Contractors', 'from_id'),
		   'hto'    => array(self::BELONGS_TO, 'Homeowners', 'to_id'),
		   'cto'    => array(self::BELONGS_TO, 'Contractors', 'to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'message_id' => 'Message',
			'subject' => 'Subject',
			'message' => 'Message',
			'from_id' => 'From',
			'from_user_type' => 'From User Type',
			'to_id' => 'To',
			'to_user_type' => 'To User Type',
			'date_sent' => 'Date Sent',
			'read' => 'Read',
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

		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('from_id',$this->from_id);
		$criteria->compare('from_user_type',$this->from_user_type,true);
		$criteria->compare('to_id',$this->to_id);
		$criteria->compare('to_user_type',$this->to_user_type,true);
		$criteria->compare('date_sent',$this->date_sent,true);
		$criteria->compare('read',$this->read);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "referral".
 *
 * The followings are the available columns in table 'referral':
 * @property integer $refer_id
 * @property integer $userid
 * @property string $user_type
 * @property integer $referred_by
 * @property string $referred_by_type
 */
class Referral extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Referral the static model class
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
		return 'referral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, referred_by', 'required'),
			array('userid, referred_by', 'numerical', 'integerOnly'=>true),
			array('user_type, referred_by_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('refer_id, userid, user_type, referred_by, referred_by_type', 'safe', 'on'=>'search'),
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
			'refer_id' => 'Refer',
			'userid' => 'Userid',
			'user_type' => 'User Type',
			'referred_by' => 'Referred By',
			'referred_by_type' => 'Referred By Type',
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

		$criteria->compare('refer_id',$this->refer_id);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('referred_by',$this->referred_by);
		$criteria->compare('referred_by_type',$this->referred_by_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
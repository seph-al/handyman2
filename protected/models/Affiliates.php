<?php

/**
 * This is the model class for table "affiliates".
 *
 * The followings are the available columns in table 'affiliates':
 * @property integer $aff_id
 * @property integer $userid
 * @property string $user_type
 * @property integer $affiliate_id
 */
class Affiliates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Affiliates the static model class
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
		return 'affiliates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, affiliate_id', 'numerical', 'integerOnly'=>true),
			array('user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aff_id, userid, user_type, affiliate_id', 'safe', 'on'=>'search'),
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
			'aff_id' => 'Aff',
			'userid' => 'Userid',
			'user_type' => 'User Type',
			'affiliate_id' => 'Affiliate',
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

		$criteria->compare('aff_id',$this->aff_id);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('affiliate_id',$this->affiliate_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
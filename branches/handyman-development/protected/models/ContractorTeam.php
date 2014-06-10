<?php

/**
 * This is the model class for table "contractor_team".
 *
 * The followings are the available columns in table 'contractor_team':
 * @property integer $member_id
 * @property integer $contractor_id
 * @property integer $invited_id
 * @property integer $confirmed
 * @property string $invited_date
 */
class ContractorTeam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContractorTeam the static model class
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
		return 'contractor_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contractor_id, invited_id', 'required'),
			array('contractor_id, invited_id, confirmed', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, contractor_id, invited_id, confirmed, invited_date', 'safe', 'on'=>'search'),
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
		  'contractor' => array(self::BELONGS_TO, 'Contractors', 'contractor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'member_id' => 'Member',
			'contractor_id' => 'Contractor',
			'invited_id' => 'Invited',
			'confirmed' => 'Confirmed',
			'invited_date' => 'Invited Date',
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

		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('contractor_id',$this->contractor_id);
		$criteria->compare('invited_id',$this->invited_id);
		$criteria->compare('confirmed',$this->confirmed);
		$criteria->compare('invited_date',$this->invited_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
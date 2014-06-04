<?php

/**
 * This is the model class for table "contractor_bond".
 *
 * The followings are the available columns in table 'contractor_bond':
 * @property integer $bond_id
 * @property integer $contractor_id
 * @property string $bond_agent
 * @property string $bond_value
 * @property string $info
 */
class ContractorBond extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContractorBond the static model class
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
		return 'contractor_bond';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contractor_id, bond_agent', 'required'),
			array('contractor_id', 'numerical', 'integerOnly'=>true),
			array('bond_agent', 'length', 'max'=>200),
			array('bond_value', 'length', 'max'=>100),
			array('info', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bond_id, contractor_id, bond_agent, bond_value, info', 'safe', 'on'=>'search'),
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
			'bond_id' => 'Bond',
			'contractor_id' => 'Contractor',
			'bond_agent' => 'Bond Agent',
			'bond_value' => 'Bond Value',
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

		$criteria->compare('bond_id',$this->bond_id);
		$criteria->compare('contractor_id',$this->contractor_id);
		$criteria->compare('bond_agent',$this->bond_agent,true);
		$criteria->compare('bond_value',$this->bond_value,true);
		$criteria->compare('info',$this->info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
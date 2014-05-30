<?php

/**
 * This is the model class for table "sysdiagrams".
 *
 * The followings are the available columns in table 'sysdiagrams':
 * @property string $name
 * @property integer $principal_id
 * @property integer $diagram_id
 * @property integer $version
 * @property string $definition
 */
class Sysdiagrams extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sysdiagrams the static model class
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
		return 'sysdiagrams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, principal_id', 'required'),
			array('principal_id, version', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>160),
			array('definition', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, principal_id, diagram_id, version, definition', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'principal_id' => 'Principal',
			'diagram_id' => 'Diagram',
			'version' => 'Version',
			'definition' => 'Definition',
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('principal_id',$this->principal_id);
		$criteria->compare('diagram_id',$this->diagram_id);
		$criteria->compare('version',$this->version);
		$criteria->compare('definition',$this->definition,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $project_id
 * @property integer $project_type_id
 * @property string $description
 * @property string $start_date
 * @property string $status_for_project
 * @property string $time_frame
 * @property integer $owned_property
 * @property string $address
 * @property integer $state_id
 * @property string $zipcode
 * @property integer $homeowner_id
 * @property string $date_added
 * @property string $city
 * @property string $budget
 * @property integer $in_renovation
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_type_id, owned_property, state_id, homeowner_id, in_renovation', 'numerical', 'integerOnly'=>true),
			array('start_date, status_for_project, time_frame, city, budget', 'length', 'max'=>200),
			array('zipcode', 'length', 'max'=>100),
			array('description, address', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, project_type_id, description, start_date, status_for_project, time_frame, owned_property, address, state_id, zipcode, homeowner_id, date_added, city, budget, in_renovation', 'safe', 'on'=>'search'),
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
		   'type'    => array(self::BELONGS_TO, 'Projecttypes', 'project_type_id'),
		   'state'    => array(self::BELONGS_TO, 'States', 'state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'project_type_id' => 'Project Type',
			'description' => 'Description',
			'start_date' => 'Start Date',
			'status_for_project' => 'Status For Project',
			'time_frame' => 'Time Frame',
			'owned_property' => 'Owned Property',
			'address' => 'Address',
			'state_id' => 'State',
			'zipcode' => 'Zipcode',
			'homeowner_id' => 'Homeowner',
			'date_added' => 'Date Added',
			'city' => 'City',
			'budget' => 'Budget',
			'in_renovation' => 'In Renovation',
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

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('project_type_id',$this->project_type_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('status_for_project',$this->status_for_project,true);
		$criteria->compare('time_frame',$this->time_frame,true);
		$criteria->compare('owned_property',$this->owned_property);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('homeowner_id',$this->homeowner_id);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('in_renovation',$this->in_renovation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
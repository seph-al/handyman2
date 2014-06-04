<?php

/**
 * This is the model class for table "homeowner_views".
 *
 * The followings are the available columns in table 'homeowner_views':
 * @property integer $view_id
 * @property integer $homeowner_id
 * @property integer $viewed_by
 * @property string $viewed_user_type
 * @property string $date_viewed
 */
class HomeownerViews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HomeownerViews the static model class
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
		return 'homeowner_views';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('homeowner_id', 'required'),
			array('homeowner_id, viewed_by', 'numerical', 'integerOnly'=>true),
			array('viewed_user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('view_id, homeowner_id, viewed_by, viewed_user_type, date_viewed', 'safe', 'on'=>'search'),
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
			'view_id' => 'View',
			'homeowner_id' => 'Homeowner',
			'viewed_by' => 'Viewed By',
			'viewed_user_type' => 'Viewed User Type',
			'date_viewed' => 'Date Viewed',
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

		$criteria->compare('view_id',$this->view_id);
		$criteria->compare('homeowner_id',$this->homeowner_id);
		$criteria->compare('viewed_by',$this->viewed_by);
		$criteria->compare('viewed_user_type',$this->viewed_user_type,true);
		$criteria->compare('date_viewed',$this->date_viewed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
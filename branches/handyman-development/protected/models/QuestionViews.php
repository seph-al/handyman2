<?php

/**
 * This is the model class for table "question_views".
 *
 * The followings are the available columns in table 'question_views':
 * @property integer $view_id
 * @property integer $question_id
 * @property integer $viewed_by
 * @property string $viewed_user_type
 * @property string $date_viewed
 */
class QuestionViews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestionViews the static model class
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
		return 'question_views';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id', 'required'),
			array('question_id, viewed_by', 'numerical', 'integerOnly'=>true),
			array('viewed_user_type', 'length', 'max'=>100),
			array('date_viewed', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('view_id, question_id, viewed_by, viewed_user_type, date_viewed', 'safe', 'on'=>'search'),
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
		  'question'    => array(self::BELONGS_TO, 'Questions', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'view_id' => 'View',
			'question_id' => 'Question',
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
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('viewed_by',$this->viewed_by);
		$criteria->compare('viewed_user_type',$this->viewed_user_type,true);
		$criteria->compare('date_viewed',$this->date_viewed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
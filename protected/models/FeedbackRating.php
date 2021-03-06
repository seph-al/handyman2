<?php

/**
 * This is the model class for table "feedback_rating".
 *
 * The followings are the available columns in table 'feedback_rating':
 * @property integer $id
 * @property integer $feedback_id
 * @property integer $vote_count
 * @property string $vote_average
 * @property integer $vote_sum
 */
class FeedbackRating extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeedbackRating the static model class
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
		return 'feedback_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('feedback_id, vote_count, vote_sum', 'numerical', 'integerOnly'=>true),
			array('vote_average', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, feedback_id, vote_count, vote_average, vote_sum', 'safe', 'on'=>'search'),
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
		  'feedback'    => array(self::BELONGS_TO, 'Feedback', 'feedback_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'feedback_id' => 'Feedback',
			'vote_count' => 'Vote Count',
			'vote_average' => 'Vote Average',
			'vote_sum' => 'Vote Sum',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('feedback_id',$this->feedback_id);
		$criteria->compare('vote_count',$this->vote_count);
		$criteria->compare('vote_average',$this->vote_average,true);
		$criteria->compare('vote_sum',$this->vote_sum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
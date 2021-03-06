<?php

/**
 * This is the model class for table "question_votes".
 *
 * The followings are the available columns in table 'question_votes':
 * @property integer $vote_id
 * @property integer $question_id
 * @property integer $voted_by
 * @property string $voted_user_type
 */
class QuestionVotes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestionVotes the static model class
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
		return 'question_votes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, voted_user_type', 'required'),
			array('question_id, voted_by', 'numerical', 'integerOnly'=>true),
			array('voted_user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vote_id, question_id, voted_by, voted_user_type', 'safe', 'on'=>'search'),
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
			'vote_id' => 'Vote',
			'question_id' => 'Question',
			'voted_by' => 'Voted By',
			'voted_user_type' => 'Voted User Type',
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

		$criteria->compare('vote_id',$this->vote_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('voted_by',$this->voted_by);
		$criteria->compare('voted_user_type',$this->voted_user_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
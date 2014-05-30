<?php

/**
 * This is the model class for table "answers".
 *
 * The followings are the available columns in table 'answers':
 * @property integer $answer_id
 * @property integer $question_id
 * @property string $answer
 * @property integer $owner_id
 * @property string $owner_user_type
 * @property string $date_posted
 * @property integer $is_best
 */
class Answers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Answers the static model class
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
		return 'answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('question_id, owner_id, is_best', 'numerical', 'integerOnly'=>true),
			array('owner_user_type', 'length', 'max'=>100),
			array('answer', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answer_id, question_id, answer, owner_id, owner_user_type, date_posted, is_best', 'safe', 'on'=>'search'),
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
		 'huser'    => array(self::BELONGS_TO, 'Homeowners', 'owner_id'),
		 'cuser'    => array(self::BELONGS_TO, 'Contractors', 'owner_id'),
		 'question'    => array(self::BELONGS_TO, 'Questions', 'question_id'),
		 'voteCount' => array(self::STAT, 'AnswerVotes','answer_id'), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_id' => 'Answer',
			'question_id' => 'Question',
			'answer' => 'Answer',
			'owner_id' => 'Owner',
			'owner_user_type' => 'Owner User Type',
			'date_posted' => 'Date Posted',
			'is_best' => 'Is Best',
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

		$criteria->compare('answer_id',$this->answer_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('owner_user_type',$this->owner_user_type,true);
		$criteria->compare('date_posted',$this->date_posted,true);
		$criteria->compare('is_best',$this->is_best);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
   public function canvote($answer_id,$userid,$role)
    {
        $can = false;
        $answer = self::model()->findByPk($answer_id);
    	$count = AnswerVotes::model()->countByAttributes(array('answer_id'=>$answer_id,'voted_by'=>$userid,'voted_user_type'=>$role));
    	if ($answer->owner_id != $userid && $answer->owner_user_type!=$role){
    		if ($count==0){
    			$can = true;
    		}
    	}
    	
    	return $can;
    }
}
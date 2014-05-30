<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $question_id
 * @property string $title
 * @property string $content
 * @property integer $owner_id
 * @property string $owner_user_type
 * @property integer $project_type_id
 * @property string $date_posted
 * @property string $filename
 */
class Questions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Questions the static model class
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
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('owner_id, project_type_id', 'numerical', 'integerOnly'=>true),
			array('title, filename', 'length', 'max'=>200),
			array('owner_user_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('question_id, title, content, owner_id, owner_user_type, project_type_id, date_posted, filename', 'safe', 'on'=>'search'),
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
		   'type'     =>  array(self::BELONGS_TO, 'Projecttypes', 'project_type_id'),
		   'voteCount' => array(self::STAT, 'QuestionVotes','question_id'),
		   'viewCount' => array(self::STAT, 'QuestionViews','question_id'),
		   'answerCount' => array(self::STAT, 'Answers','question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'title' => 'Title',
			'content' => 'Content',
			'owner_id' => 'Owner',
			'owner_user_type' => 'Owner User Type',
			'project_type_id' => 'Project Type',
			'date_posted' => 'Date Posted',
			'filename' => 'Filename',
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('owner_user_type',$this->owner_user_type,true);
		$criteria->compare('project_type_id',$this->project_type_id);
		$criteria->compare('date_posted',$this->date_posted,true);
		$criteria->compare('filename',$this->filename,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
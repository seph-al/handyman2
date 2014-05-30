<?php

/**
 * This is the model class for table "contents".
 *
 * The followings are the available columns in table 'contents':
 * @property integer $ContentId
 * @property string $Title
 * @property string $MetaTitle
 * @property string $ContentText
 * @property string $Created
 * @property integer $IsVideo
 * @property string $VideoImage
 * @property string $Snippet
 * @property string $RewriteUrl
 *
 * The followings are the available model relations:
 * @property Categories[] $categories
 */
class Contents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contents the static model class
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
		return 'contents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ContentText, Created', 'required'),
			array('IsVideo', 'numerical', 'integerOnly'=>true),
			array('Title, MetaTitle, RewriteUrl', 'length', 'max'=>150),
			array('VideoImage', 'length', 'max'=>100),
			array('Snippet', 'length', 'max'=>750),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ContentId, Title, MetaTitle, ContentText, Created, IsVideo, VideoImage, Snippet, RewriteUrl', 'safe', 'on'=>'search'),
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
			'categories' => array(self::MANY_MANY, 'Categories', 'contentcategories(ContentId, CategoryId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ContentId' => 'Content',
			'Title' => 'Title',
			'MetaTitle' => 'Meta Title',
			'ContentText' => 'Content Text',
			'Created' => 'Created',
			'IsVideo' => 'Is Video',
			'VideoImage' => 'Video Image',
			'Snippet' => 'Snippet',
			'RewriteUrl' => 'Rewrite Url',
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

		$criteria->compare('ContentId',$this->ContentId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('MetaTitle',$this->MetaTitle,true);
		$criteria->compare('ContentText',$this->ContentText,true);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('IsVideo',$this->IsVideo);
		$criteria->compare('VideoImage',$this->VideoImage,true);
		$criteria->compare('Snippet',$this->Snippet,true);
		$criteria->compare('RewriteUrl',$this->RewriteUrl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
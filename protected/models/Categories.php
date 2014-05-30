<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $CategoryId
 * @property string $Title
 * @property string $RewriteUrl
 * @property string $MetaTitle
 *
 * The followings are the available model relations:
 * @property Contents[] $contents
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categories the static model class
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
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title, RewriteUrl', 'length', 'max'=>50),
			array('MetaTitle', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CategoryId, Title, RewriteUrl, MetaTitle', 'safe', 'on'=>'search'),
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
			'contents' => array(self::MANY_MANY, 'Contents', 'contentcategories(CategoryId, ContentId)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CategoryId' => 'Category',
			'Title' => 'Title',
			'RewriteUrl' => 'Rewrite Url',
			'MetaTitle' => 'Meta Title',
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

		$criteria->compare('CategoryId',$this->CategoryId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('RewriteUrl',$this->RewriteUrl,true);
		$criteria->compare('MetaTitle',$this->MetaTitle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
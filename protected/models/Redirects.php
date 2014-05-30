<?php

/**
 * This is the model class for table "redirects".
 *
 * The followings are the available columns in table 'redirects':
 * @property integer $RedirectId
 * @property string $IncomingUrl
 * @property string $RedirectTo
 * @property string $Created
 */
class Redirects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Redirects the static model class
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
		return 'redirects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Created', 'required'),
			array('IncomingUrl, RedirectTo', 'length', 'max'=>225),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RedirectId, IncomingUrl, RedirectTo, Created', 'safe', 'on'=>'search'),
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
			'RedirectId' => 'Redirect',
			'IncomingUrl' => 'Incoming Url',
			'RedirectTo' => 'Redirect To',
			'Created' => 'Created',
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

		$criteria->compare('RedirectId',$this->RedirectId);
		$criteria->compare('IncomingUrl',$this->IncomingUrl,true);
		$criteria->compare('RedirectTo',$this->RedirectTo,true);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
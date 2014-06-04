<?php

/**
 * This is the model class for table "homeowners".
 *
 * The followings are the available columns in table 'homeowners':
 * @property integer $homeowner_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $username
 * @property string $phone_number
 * @property string $password
 * @property string $date_registered
 * @property string $photo
 */
class Homeowners extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Homeowners the static model class
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
		return 'homeowners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username', 'required'),
			array('firstname, lastname, email, username, phone_number, password, photo', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('homeowner_id, firstname, lastname, email, username, phone_number, password, date_registered, photo', 'safe', 'on'=>'search'),
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
		  'viewCount' => array(self::STAT, 'HomeownerViews','homeowner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'homeowner_id' => 'Homeowner',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'username' => 'Username',
			'phone_number' => 'Phone Number',
			'password' => 'Password',
			'date_registered' => 'Date Registered',
			'photo' => 'Photo',
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

		$criteria->compare('homeowner_id',$this->homeowner_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date_registered',$this->date_registered,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
public function updatePoints($userid){
		$total = 0;
		
		
		//profile completness
		$attr = self::findByPk($userid);
		$ps = $attr->attributes;
		$size = count($ps);
		
		$profile_total = 0;
		$ptotal = 0;
		foreach ($ps as $key=>$val){
			if ($val != null || $val != ""){
				$ptotal++;
			}
		}
		$profile_total = ($ptotal/$size) * 100;
		
		//inbox points
		$inbox_total = 0;
		$inbox = Messages::model()->countByAttributes(array('to_id'=>$userid,'to_user_type'=>'homeowner'));
		$outbox = Messages::model()->countByAttributes(array('from_id'=>$userid,'from_user_type'=>'homeowner'));
	    $inbox_total = ($inbox + $outbox) * 5;
	    
	    
	    //questions
	    $questions_total = Questions::model()->countByAttributes(array('owner_id'=>$userid,'owner_user_type'=>'homeowner'));
	    $questions_total = $questions_total * 5;
	    
	    //answers = 
	    $answer_total = Answers::model()->countByAttributes(array('owner_id'=>$userid,'owner_user_type'=>'homeowner'));
	    $answer_total = $answer_total * 5;

	    //answers won
	    $awon =  Answers::model()->countByAttributes(array('owner_id'=>$userid,'owner_user_type'=>'homeowner','is_best'=>1));
	    $awon = $awon * 10;

	    //profile views
	    $views = HomeownerViews::model()->countByAttributes(array('homeowner_id'=>$userid));
	    $views_total = $views * 1; 
	    
	    $total = ceil($profile_total + $inbox_total + $questions_total + $answer_total + $views_total + $awon);
	   
	    //save to points table
	    $count = HomeownerPoints::model()->countByAttributes(array('homeowner_id'=>$userid));
	    
	    if ($count >0){
	    	$details = HomeownerPoints::model()->findByAttributes(array('homeowner_id'=>$userid));
	    }else {
	    	$details = new HomeownerPoints();
	    }
	    
	    
	    $details->points = $total;
	    $details->homeowner_id = $userid;
	    $details->save();
	    return $total;
	}
}
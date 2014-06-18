<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->firstname;
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()

 function isAdmin()
{
    $user = $this->loadUser(Yii::app()->user->id);
    if ($user===null)
        return 0;
    else
        return intval($user->type) == 1;
}
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Homeowners::model()->findByPk($id);
        }
        return $this->_model;
    }
    
 function getUsername(){
    $user = $this->loadUser(Yii::app()->user->id);
    return Yii::app()->user->getUsername();
  }
}
?>
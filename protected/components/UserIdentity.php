<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        private $_id;
        private $_username;
        public $errorMessage;
        
        
        const ERROR_USERNAME_INVALID = 'Invalid Email';
        const ERROR_PASSWORD_INVALID = 'Invalid Password';
        
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
public function authenticate()
	{

		if ($this->role == "homeowner"){
		  $user = Homeowners::model()->findByAttributes(array('email'=>$this->username));
			if ($user===null) { // No user found!
				$this->errorMessage=self::ERROR_USERNAME_INVALID;
			} else if ($user->password !== $this->password ) { // Invalid password!
				$this->errorMessage=self::ERROR_PASSWORD_INVALID;
			} else { // Okay!
			    $this->errorMessage=self::ERROR_NONE;
			    // Store the role in a session:
			    $this->setState('role',$this->role);
			    $this->setState('loginname',$user->firstname);
				$this->_id = $user->homeowner_id;
				$this->_username = $user->username;
				
			}
		}else {
		  $user = Contractors::model()->findByAttributes(array('Email'=>$this->username));	
			if ($user===null) { // No user found!
				$this->errorMessage=self::ERROR_USERNAME_INVALID;
			} else if ($user->Password !== $this->password ) { // Invalid password!
				$this->errorMessage=self::ERROR_PASSWORD_INVALID;
			} else { // Okay!
			    $this->errorMessage=self::ERROR_NONE;
			    // Store the role in a session:
			    $this->setState('role',$this->role);
			    $this->setState('loginname',$user->ContactName);
				$this->_id = $user->ContractorId;
				$this->_username = $user->Username;
			}
		}
		return !$this->errorMessage;
	}
    public  function getId(){
        return $this->_id;
    }
    public function getUsername(){
    	return $this->_username;
    }

   
    
}
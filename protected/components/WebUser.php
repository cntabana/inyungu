<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->firstname
  function getUsername(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->username;
  }
 
 function getStatus(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->status;
  }
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){
    $user = $this->loadUser(Yii::app()->user->id);
    return intval($user->status) == 2;
  }
 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}
?>
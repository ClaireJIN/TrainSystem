<?php 

class Register extends Model 
{
  function __construct() {
    parent::__construct();
  }

  public function addUser() {
    session_start();
    $query = "INSERT INTO user VALUES('".$_SESSION['userID']."', '".$_SESSION['Email']."', '".$_SESSION['password']."', '".$_SESSION['name']."', '".$_SESSION['sex']."', NULL)";
    $this->conn->query($query);
  }
}

 ?>

<?php
/**
 *
 */
class Login extends Model
{
  function __construct() {
     parent::__construct();
     session_start();
  } 

 public function checkUser() {
    $query = "SELECT EXISTS (SELECT * FROM user WHERE Email = '".$_SESSION['Email']."' AND password = '".$_SESSION['password']."')";
    $result = $this->conn->query($query)->fetchColumn(0);
    return $result;
  }
}
 ?>

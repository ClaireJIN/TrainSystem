<?php
/**
 *
 */
class Model
{
  protected $conn;
  function __construct()
  {
    $this->conn = $this->connectDB();
  }

  protected function connectDB()
  {
    try{
      $dbh = new PDO("mysql:host=localhost; dbname=TrainSystem", "root", "");
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {echo "connect error"."<br>";}
    return $dbh;
  }
}

 ?>

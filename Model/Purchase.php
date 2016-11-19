<?php 

class Purchase extends Model 
{ 
  function __construct() {
    parent::__construct();
   // session_start();
  }

  public function getPrice() {
     $userType = $_SESSION['userType']; 
     $trainID = $_SESSION['trainID'];   
     $carriageType = $_SESSION['carriageType']; 
     $start_station = $_SESSION['start_station'];   //where is the session of start_station and destnation without inputting again? 
     $destnation = $_SESSION['destnation'];    echo $destnation; echo " 表示session有效 <br>   ";
     $userID = $_SESSION['userID'];          //  echo $userID;
     $trainType = $_SESSION['trainType']; 
     if ($userType == "学生") {

        $q = "SELECT benefit_start FROM student WHERE userID = '".$userID."'";
        $r = $this->conn->query($q);
        $start = $r->fetchColumn(0);
        $q = "SELECT benefit_end FROM student WHERE userID = '".$userID."'";
        $r = $this->conn->query($q);
        $end = $r->fetchColumn(0);

        if ($start == $start_station && $end == $destnation) {
          $q = "SELECT distance FROM route WHERE from_station = '".$start."' AND to_station = '".$end."' ";
          $distance = $this->conn->query($q)->fetchColumn(0); 
          $price = 0.75;
        } else {
          echo "您的乘车区间有误" . "<br>";
          header("Refresh:2;url=Welcome_query.php");
        } 
   }
        
   if ($userType == "普通乘客") {
        $q = "SELECT distance FROM route WHERE from_station = '".$start_station."' AND to_station = '".$destnation."' ";
        $distance = $this->conn->query($q)->fetchColumn(0); echo $distance; 
        $price = 1;
    } 

    $q = "SELECT type_ratio FROM trainType WHERE type = '".$trainType."' ";
    $train_type = $this->conn->query($q)->fetchColumn(0);
    
    $q = "SELECT type_ratio FROM carriageType WHERE type = '".$carriageType."' ";
    $carriage_type = $this->conn->query($q)->fetchColumn(0);
   
    $price *= $distance * $train_type * $carriage_ratio;
    return $price;
  }

  public function getSeat() { 
    $q = "SELECT carriageID FROM carriage WHERE trainID = '".$_SESSION['trainID']."' AND carriageType = '".$_SESSION['carriageType']."' ";
    $rows = $this->conn->query($q);
    while ($row = $rows->fetch(PDO::FETCH_NUM)) {
      $carriageID = $row[0];
      $q = "SELECT seatID FROM seat WHERE carriageID = '".$carriageID."' AND status = 0";
      $seats = $this->conn->query($q);
      while ($seat = $seats->fetch(PDO::FETCH_NUM)) {
       $seatID = $seat[0]; 
       $q0 = "UPDATE seat SET userID = '".$_SESSION['userID']."' WHERE seatID = '".$seatID."'";
       $this->conn->query($q0);
       $q = "UPDATE seat SET status = 1 WHERE seatID = '".$seatID."'";
       $this->conn->query($q); 
       return $seatID;
      }
   }
 }
}

?>


<?php 

class Query extends Model 
{
  
 function __construct() {
    parent::__construct();
  }
 
   public function queryStation() { 
    // CREATE VIEW timeTable AS SELECT  day, stationName, arrive_time, station.trainID 
    // FROM station INNER JOIN train ON train.trainID = station.trainID;
   // session_start();

    $query1 = "SELECT trainID FROM timeTable WHERE stationName = '".$_SESSION['start_station']."' ";
    $query1 .= "AND day = '".$_SESSION['day']."' ";
    $rows = $this->conn->query($query1);

    $query1 = "SELECT COUNT(*) FROM timeTable WHERE stationName = '".$_SESSION['start_station']."' ";
    $query1 .= "AND day = '".$_SESSION['day']."' "; 
    $counts = $this->conn->query($query1);
    if ($counts->fetchColumn(0) == 0) { echo "无效查询结果"."<br>"; print("<a href='./View/Welcome_query.php'>返回</a>");return 0;}
   
    echo '车次' . '    '. '发车时间'. '     '. '到站时间'. '<br>';
    $flag = 0; 
    while($row = $rows->fetch(PDO::FETCH_NUM)) {
     $train = $row[0];
     $query2 = "SELECT EXISTS (SELECT * FROM timeTable WHERE stationName = '".$_SESSION['destnation']."')";
     $result = $this->conn->query($query2);
     if ($result == 1) {
        $flag = 1;
        $query3 = "SELECT arrive_time FROM station WHERE stationName = '".$_SESSION['start_station']."' AND trainID = '".$train."'";
        $query4 = "SELECT arrive_time FROM station WHERE stationName = '".$_SESSION['destnation']."' AND trainID = '".$train."'";
        $depart_time = $this->conn->query($query3)->fetchColumn(0);
        $get_time = $this->conn->query($query4)->fetchColumn(0);
        echo $train . '    ' . $depart_time . '    ' . $get_time ;
      } 
              
    } 
     if ($flag == 0)  { echo "无效查询结果"."<br>"; print("<a href='./View/Welcome_query.php'>返回</a>");return 0;}
     else return 1;

   }
  
}
 ?>

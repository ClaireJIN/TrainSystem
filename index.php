
<!DOCTYPE html>
<html>
    <title>TrainSystem</title>
</html>


<?php
session_start();

$_SESSION['Email'] =  $_POST['Email'];
$_SESSION['password'] =  $_POST['password'];
$_SESSION['name'] =  isset($_POST['name']) ? $_POST['name'] : NULL;
$_SESSION['sex'] =  isset($_POST['sex']) ? $_POST['sex'] : NULL;

$_SESSION['start_station'] =  isset($_POST['start_station']) ? $_POST['start_station'] : NULL;
$_SESSION['destnation'] =  isset($_POST['destnation']) ? $_POST['destnation'] : NULL;
$_SESSION['day'] =  isset($_POST['day']) ? $_POST['day'] : NULL;

$_SESSION['userID'] =  isset($_POST['userID']) ? $_POST['userID'] : NULL;
$_SESSION['userType'] =  isset($_POST['userType']) ? $_POST['userType'] : NULL;
$_SESSION['trainID'] =  isset($_POST['trainID']) ? $_POST['trainID'] : NULL;
$_SESSION['carriageType'] =  isset($_POST['carriageType']) ? $_POST['carriageType'] : NULL;
$_SESSION['trainType'] =  isset($_POST['trainType']) ? $_POST['trainType'] : NULL;

$_SESSION['r_trainID'] =  isset($_POST['r_trainID']) ? $_POST['r_trainID'] : NULL;
$_SESSION['r_carriageID'] =  isset($_POST['r_carriageID']) ? $_POST['r_carriageID'] : NULL;
$_SESSION['r_seatID'] =  isset($_POST['r_seatID']) ? $_POST['r_seatID'] : NULL;

$mod = isset($_GET['mod']) ? $_GET['mod'] : "Login";
$action = isset($_GET['action']) ? $_GET['action'] : "index";

require "config.php";
$className = $mod . CONTROLLER_SUFFIX;
function __autoload($controller) {
  $modfile = CONTROLLER_PATH . $controller . ".php";
  if (file_exists($modfile)) {
    include $modfile;
  } else {
    echo "file " . $modfile . " not exists" . "<br>";
  }

  if (!class_exists($controller, false)) {
    echo "class " . $controller . " not exists" . "<br>";
  }
}

if (class_exists($className)) {
  $object = new $className;
  if (method_exists($object, $action)) {
    $object->$action();
  } else {
    echo "method " . $action . " not exists" . "<br>";
  }
}

 ?>

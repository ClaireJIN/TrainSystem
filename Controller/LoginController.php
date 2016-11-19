<?php
/**
 *
 */

class LoginController extends Controller
{
  function __construct()
  {
    parent::__construct();
    include MODEL_PATH . "Model.php";
    include MODEL_PATH . "Login.php";
  }

  public function index()
  { 
    $login = new Login;
    $result = $login->checkUser();
    if ($result == 1) {
      include VIEW_PATH . "query_return.php";
    } else { 
      echo "对不起，您还没有注册";
      header("Refresh:2;url=register.php");
    }

  }
}

 ?>

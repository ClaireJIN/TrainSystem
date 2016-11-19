
<?php

class RegisterController extends Controller
{
  function __construct()
  {
    include MODEL_PATH . "Model.php";
    include MODEL_PATH . "Register.php";
    parent::__construct();
  }

  public function process() {
    $login = new Register;
    $login->addUser();
    echo "注册成功";
    include VIEW_PATH . "query_return.php";
  }
}

?>

<?php 

class PurchaseController extends Controller 
{

  function __construct()
  {
    parent::__construct(); 
    include MODEL_PATH . "Model.php";
    include MODEL_PATH . "Purchase.php";
  }


  public function index() { 
    $purchase = new Purchase;
    $price = $purchase->getPrice();
    $seatID = $purchase->getSeat();
    echo "车票金额为：" . $price . "元". "<br>";
    echo "座位号为：" . $seatID;
  }
}
 ?>

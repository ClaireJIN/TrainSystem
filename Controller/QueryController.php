<?php

class QueryController extends Controller 
{
 function __construct()
  { 
    parent::__construct(); 
    include MODEL_PATH . "Model.php";
    include MODEL_PATH . "Query.php"; 
  }

   public function index() {
	$query = new Query;
        $r =  $query->queryStation();
        if ($r == 1)
            include VIEW_PATH . "Welcome_purchase.php";
 
   }
}


?>

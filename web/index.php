<?php
use Controllers\Controller;
use Models\Model;
use Views\View;
use Dishes\Dish;
require_once("..\src\AutoLoader\AutoLoader.php");
if( (session_id() == '') ){
	session_start();
}


?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Заказ еды</title>
<link rel="stylesheet" type="text/css" href="../template/css/style.css">
<link rel="stylesheet" type="text/css" href="../template/css/jquery.confirm.css" />
</head>
<body>

<script src="../vendor/js/jquery.min.js"></script>
<script src="../js/jquery.confirm.js"></script>
<script src="../js/script.js"></script>


    <div class="item">
        <div class="exit" id="exit"> </div>
		<div class="exit" id="query"> </div>
    </div>	
	
<div class="main">
<?php
error_reporting(E_ALL ^ E_NOTICE);

$control = new Controller();
$control->processData();
?>
</div>

</body>
</html>


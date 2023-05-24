<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Неудалосьподключитьсяк MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'DELETE'){
			$a=array();
			$json = json_decode(file_get_contents('php://input'),true);
			foreach ($json as $v){
				$text="DELETE FROM `theatres` WHERE ID=".$v['id'];
				$result=$mysqli->query($text);
				$b=array('result'=>$result);
				$a[]=$b;
			};	
			echo json_encode($a);
		return;
		}
?>

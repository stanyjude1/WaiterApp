<?php
include "connPDO.php";
$i=0;
if(isset($_REQUEST['staff_id'])){
	$staff_id = (int)$_REQUEST['staff_id'];
	$stmt = $conn->prepare("Select * from users where id=\"$staff_id\"");	
	$stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
   	$row=$stmt->fetch();
	if($row!=null){
		if(isset($_REQUEST['zone_id'])){
			$zone_id = $_REQUEST['zone_id'];
			$stmt = $conn->prepare("Select zone_id from tables where zone_id=\"$zone_id\"");
			$stmt->execute();
	    	$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
	    	$row=$stmt->fetchAll();
			if($row!=null){
				$stmt = $conn->prepare("Select * from tables where zone_id=\"$zone_id\"");
				$stmt->execute();
	    		$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
	    		$row=$stmt->fetchAll();	
				foreach ($row as $content){
					$response['DiningDetails'][$i]['table_name'] = $content['name'];
					$response['DiningDetails'][$i]['table_id'] = (int)$content['id'];
					$response['DiningDetails'][$i]['capacity'] = (int)$content['table_capacity'];
					$response['DiningDetails'][$i]['status'] = "Active";
					$i++;
				}
				$response['response'] = 200;
				$response['restaurant_id'] = 1;
				$response['restaurant_name'] = "Karama Restaurant";
		}
		else{
			$response['error_code'] = 11;
			$response['message'] = "Invalid zone_id";
		}
	}
	else{
		$response['error_code'] = 10;
		$response['message'] = "zone_id is missing";
	}
}
else{
	$response['error_code'] = 9;
	$response['message'] = "staff_id is invalid";
}
}
else{
	$response['error_code'] = 10;
	$response['message'] = "staff_id is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
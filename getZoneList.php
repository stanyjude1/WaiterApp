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
   		$stmt = $conn->prepare("Select * from zones");	
		$stmt->execute();
		$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);	
   		$row=$stmt->fetchAll();
		foreach ($row as $content){
			$response['ZoneDetails'][$i]['name'] = $content['name'];
			$response['ZoneDetails'][$i]['id'] = (int)$content['id'];
			$i++;
		}
		$response['response'] = 200;
		$response['restaurant_id'] = 1;
		$response['restaurant_name'] = "Karama Restaurant";
	}
	else{
		$response['error_code'] = 2;
		$response['message'] = 'Invalid Staff ID';
	}	
}
else{
	$response['error_code'] = 8;
	$response['message'] = "staff_id is missing";
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();


?>


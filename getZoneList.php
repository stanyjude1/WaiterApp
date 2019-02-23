<?php

if(isset($_REQUEST['staff_id'])){
	$response['ZoneDetails'][0]['name'] = "MJ Zone";
	$response['ZoneDetails'][0]['id'] = 1;
	$response['ZoneDetails'][1]['name'] = "S Zone";
	$response['ZoneDetails'][1]['id'] = 2;
	$response['ZoneDetails'][2]['name'] = "P Zone";
	$response['ZoneDetails'][2]['id'] = 3;
	$response['ZoneDetails'][3]['name'] = "B Zone";
	$response['ZoneDetails'][3]['id'] = 4;
	$response['ZoneDetails'][4]['name'] = "ET Zone";
	$response['ZoneDetails'][4]['id'] = 5;
	$response['response'] = 200;
	$response['restaurant_id'] = 1;
	$response['restaurant_name'] = "Karama Restaurant";
}
else{
	$response['error_code'] = 8;
	$response['message'] = "staff_id is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>


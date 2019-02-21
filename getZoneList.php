<?php

if(isset($_GET['staff_id'])){
	$response['zone_list'][0]['zone_name'] = "MJ Zone";
	$response['zone_list'][0]['zone_id'] = 1;
	$response['zone_list'][1]['zone_name'] = "S Zone";
	$response['zone_list'][1]['zone_id'] = 2;
	$response['zone_list'][2]['zone_name'] = "P Zone";
	$response['zone_list'][2]['zone_id'] = 3;
	$response['zone_list'][3]['zone_name'] = "B Zone";
	$response['zone_list'][3]['zone_id'] = 4;
	$response['zone_list'][4]['zone_name'] = "ET Zone";
	$response['zone_list'][4]['zone_id'] = 5;
	$response['error_code'] = 0;
	$response['message'] = "success";
	$response['staff_id'] = $_GET['staff_id'];
}
else{
	$response['error_code'] = 8;
	$response['message'] = "staff_id is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
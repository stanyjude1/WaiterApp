<?php

if(isset($_REQUEST['staff_id'])){
	if(isset($_REQUEST['zone_id'])){
		if((int)$_REQUEST['zone_id'] > 0 && (int)$_REQUEST['zone_id'] < 6){
			$j = (int)$_REQUEST['zone_id'] *10;

			for($i = 0; $i < 10 ; $i ++){
				$response['DiningDetails'][$i]['table_name'] = "TBL ".($j+1);
				$response['DiningDetails'][$i]['table_id'] = $j+1;
				$response['DiningDetails'][$i]['capacity'] = 4;
				$response['DiningDetails'][$i]['status'] = "Active";
				$j++;
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
	$response['message'] = "staff_id is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
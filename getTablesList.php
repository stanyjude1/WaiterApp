<?php

if(isset($_REQUEST['staff_id'])){
	if(isset($_REQUEST['zone_id'])){
		if((int)$_REQUEST['zone_id'] > 0 && (int)$_REQUEST['zone_id'] < 6){
			$j = (int)$_REQUEST['zone_id'] *10;

			for($i = 0; $i < 10 ; $i ++){
				$response['table_list'][$i]['table_name'] = "TBL ".($j+1);
				$response['table_list'][$i]['table_id'] = $j+1;
				$j++;
			}
			$response['error_code'] = 0;
			$response['message'] = "success";
			$response['zone_id'] = (int)$_REQUEST['zone_id'];
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
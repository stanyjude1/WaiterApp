<?php

if(isset($_REQUEST['staff_id'])){
	if(!isset($_REQUEST['branch_id'])){
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
    
	$zone_id_arr = [1,2,3,4,5];
	$zone_name_arr = ["MJ Zone", "S Zone", "P Zone", "B Zone", "ET Zone"];

	for($i = 0; $i < sizeof($zone_id_arr) ; $i++){
		$j = $zone_id_arr[$i] * 10;

		$response['zone_details'][$i]['zone_name'] = $zone_name_arr[$i];
		$response['zone_details'][$i]['zone_id'] = $zone_id_arr[$i];
		
		for($k = 0; $k < 10 ; $k ++){
			$response['zone_details'][$i]['table_list'][$k]['table_name'] = "TBL ".($j+1);
			$response['zone_details'][$i]['table_list'][$k]['table_id'] = $j+1;
			$j++;
		}
	}
	$response['error_code'] = 0;
	$response['message'] = "success";
}
else{
	$response['error_code'] = 12;
	$response['message'] = "staff_id is missing";
}
			

		

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();
?>
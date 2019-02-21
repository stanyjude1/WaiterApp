<?php

if(isset($_GET['staff_id'])){
	$staff_id = (int)$_GET['staff_id'];
	if($staff_id > 0){
		if($staff_id < 11){
			$response['staff_status'] = 1;
			$response['error_code'] = 0;
			$response['message'] = 'success';
			$response['staff_id'] = $staff_id;
		}
		else{
			$response['staff_status'] = 0;
			$response['error_code'] = 1;
			$response['message'] = 'Staff is Inactive';
			$response['staff_id'] = $staff_id;			
		}
	}
	else{
		$response['error_code'] = 2;
		$response['message'] = 'Invalid Staff ID';
	}
}
else
{
	$response['error_code'] = 3;
	$response['message'] = 'staff_id is missing';
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
.<?php
include "connPDO.php";

if(isset($_REQUEST['staff_id'])){
	$staff_id = (int)$_REQUEST['staff_id'];
	$stmt = $conn->prepare("Select * from users where id=\"$staff_id\"");	
	$stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
   	$row=$stmt->fetch();
	if($row!=null){
		$status=$row['status'];
		if($status){
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
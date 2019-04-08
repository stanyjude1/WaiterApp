<?php
include "connPDO.php";
if(isset($_REQUEST['username'])){
	if(isset($_REQUEST['password'])){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$stmt = $conn->prepare("Select * from users where username=\"$username\"");
    	$stmt->execute();
    	$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    	$row=$stmt->fetch();
		if($row!=null){
			$stmt = $conn->prepare("Select * from users where username=\"$username\"and password=\"$password\"");
    		$stmt->execute();
    		$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    		$row=$stmt->fetch();
			if($row!=null){
				$response['error_code'] = 0;
				$response['res_id'] = $row['id'];
				$response['res_name'] = $row['name'];
				if($row['status']){
					$response['status'] = 200;
					$response['message'] = "active staff";
 				}else{
					$response['status'] = 401;
					$response['message'] = "inactive staff";
				}
			}
			else{
				$response['error_code'] = 7;
				$response['message'] = "Invalid password";
			}
		}
		else{
			$response['error_code'] = 6;
			$response['message'] = "Invalid username";
		}
	}
	else{
		$response['error_code'] = 5;
		$response['message'] = "password is missing";
	}
}
else{
	$response['error_code'] = 4;
	$response['message'] = "username is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
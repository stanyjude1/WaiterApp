<?php

if(isset($_REQUEST['username'])){
	if(isset($_REQUEST['password'])){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		if($username == "waiter_one" || $username == "waiter_two"){
			if($password == "admin"){
				$response['error_code'] = 0;
				$response['message'] = "success";
				$response['res_id'] = "1";
				$response['res_name'] = "Karama Restaurant";
				$response['branch_id'] = 1;

				if($username == "waiter_one"){
					$response['staff_id'] = 1;
				}
				else{
					$response['staff_id'] = 2;
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
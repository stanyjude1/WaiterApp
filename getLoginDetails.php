<?php

if(isset($_GET['username'])){
	if(isset($_GET['password'])){
		$username = $_GET['username'];
		$password = $_GET['password'];

		if($username == "waiter_one" || $username == "waiter_two"){
			if($password == "admin"){
				$response['error_code'] = 0;
				$response['message'] = "success";

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
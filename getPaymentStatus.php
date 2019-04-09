<?php

if(!isset($_REQUEST['branch_id'])){
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }

if(isset($_REQUEST['staff_id'])){
    //$response["OrderDetails"] = array();
    $response["success"] = 0;
    $response["message"] = "paymentsuceess";
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
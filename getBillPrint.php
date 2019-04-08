<?php

if(isset($_REQUEST['staff_id'])){
    if(isset($_REQUEST['branch_id'])){
        if(isset($_REQUEST['table_id'])){
            if(isset($_REQUEST['bill_id'])){
                if($_REQUEST['bill_id'] < 75){
                    $response["response"] = 200;
                    $response["restaurant_id"] = "1";
                }
                else{
                    $response['error_code'] = 3;
                    $response['message'] = 'invalid bill_id';
                }
            }
            else{
                $response['error_code'] = 3;
                $response['message'] = 'bill_id is missing';
            }
        }
        else{
            $response['error_code'] = 3;
            $response['message'] = 'table_id is missing';
        }
    }
    else{
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
    }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
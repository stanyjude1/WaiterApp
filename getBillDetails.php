<?php

if(isset($_REQUEST['staff_id'])){
    if(isset($_REQUEST['branch_id'])){
        if(isset($_REQUEST['table_id'])){
    $n = rand(1,5);
    //$response["OrderDetails"] = array();
    $response["response"] = 200;
    $response["restaurant_id"] = "1";
    for ($j=0; $j < $n ; $j++) { 
        $names = range("A","Z");
        $ids = range(1,100);
        $response['bill_details'][$j]["table_name"] = "TBL 11";
        $response['bill_details'][$j]["table_id"]   = (int)($j+1);
        $response['bill_details'][$j]["bill_id"] = ($j + 1)*3;
        $response['bill_details'][$j]["total_price"] = "1050";
        $response['bill_details'][$j]["total_gst"] = "55";
        $response['bill_details'][$j]["total_bill"] = "1105";
    }
    //$response["OrderDetails"] = $table_details;
    
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'table_id is missing';
}}
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
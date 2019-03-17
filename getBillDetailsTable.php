<?php

if(isset($_REQUEST['staff_id'])){
    //$response["OrderDetails"] = array();
    $response["response"] = 200;
    $response["restaurant_id"] = "1";
    $response["restaurant_name"] = "Karama Restaurant";
    for ($j=0; $j < 1 ; $j++) { 
        $names = range("A","Z");
        $ids = range(1,100);
        $response["table_name"] = "TBL ".$names[$j];
        $response["table_id"]   = (int)($j+1);
        $response["ordered_categories"] = "Starters";
        $response["ordered_items"] = "Chicken Kebab";
        $response["ordered_items_qty"]  = "1";
        $response["items_price"] = "150";
        $response["total_price"] = "1050";
        $response["total_gst"] = "55";
        $response["payable_bill"] = "1105";
        $response["order_status"] = "confired";
        $response["payment_status"] = "waiting";
        $response["ordered_time"] = "12:30";
        $response["date"] = "21-12-2019";
    }
    //$response["OrderDetails"] = $table_details;
    
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
<?php

if(isset($_REQUEST['staff_id'])){
    $response["OrderDetails"] = array();
    for ($j=0; $j < 1 ; $j++) { 
        $names = range("A","Z");
        $ids = range(1,100);
        $table_details[$j]["table_name"] = "TBL ".$names[$j];
        $table_details[$j]["table_id"]   = (int)($j+1);
        $table_details[$j]["ordered_categories"] = "Starters";
        $table_details[$j]["ordered_items"] = "Chicken Kebab";
        $table_details[$j]["ordered_items_qty"]  = "1";
        $table_details[$j]["items_price"] = "150";
        $table_details[$j]["total_price"] = "1050";
        $table_details[$j]["total_gst"] = "55";
        $table_details[$j]["payable_bill"] = "1105";
        $table_details[$j]["order_status"] = "confired";
        $table_details[$j]["payment_status"] = "waiting";
        $table_details[$j]["ordered_time"] = "12:30";
        $table_details[$j]["date"] = "21-12-2019";
    }
    $response["OrderDetails"] = $table_details;
    $response["response"] = 200;
    $response["restaurant_id"] = "1";
    $response["restaurant_name"] = "Karama Restaurant";
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
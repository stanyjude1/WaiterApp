<?php

if(!isset($_REQUEST['staff_id'])){
    $response["DiningDetails"] = array();
    for ($j=0; $j < 10 ; $j++) { 
        $names = range("A","Z");
        $ids = range(1,100);
        $table_details[$j]["table_name"] = "TBL ".$names[$j];
        $table_details[$j]["table_id"]   = (int)($j+1);
        $table_details[$j]["capacity"] = (int)rand(4,10);
        $table_details[$j]["status"]     = "Active";
        $table_details[$j]["billamount"] = (float)number_format(mt_rand(3000,10000)/10, 2, '.', '');
    }
    $response["DiningDetails"] = $table_details;
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

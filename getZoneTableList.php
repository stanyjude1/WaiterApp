<?php

if(isset($_REQUEST['staff_id'])){
   if(!isset($_REQUEST['branch_id'])){
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
    
   $response[0]['zone'] = "MJ Zone";
   $response[0]['table'] = array("TBL 11", "TBL 12", "TBL 13", "TBL 14");
   //$response[0]['zone_id'] = 1;
   $response[1]['zone'] = "S Zone";
   $response[1]['table'] = array("TBL 21", "TBL 22", "TBL 23", "TBL 24");
   // $response[1]['zone_id'] = 2;
   $response[2]['zone'] = "P Zone";
   $response[2]['table'] = array("TBL 31", "TBL 32", "TBL 33", "TBL 34");
   // $response[2]['zone_id'] = 3;
   $response[3]['zone'] = "B Zone";
   $response[3]['table'] = array("TBL 41", "TBL 42", "TBL 43", "TBL 44");
   // $response[3]['zone_id'] = 4;
   $response[4]['zone'] = "ET Zone";
   $response[4]['table'] = array("TBL 51", "TBL 52", "TBL 53", "TBL 54");
   // $response[4]['zone_id'] = 5;
   // $response['response'] = 200;
   // $response['restaurant_id'] = 1;
   // $response['restaurant_name'] = "Karama Restaurant";
}
else{
   $response['error_code'] = 8;
   $response['message'] = "staff_id is missing";
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>


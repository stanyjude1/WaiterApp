<?php

if(isset($_REQUEST['staff_id'])){
   if(!isset($_REQUEST['branch_id'])){
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
    
   $response[0]['zone'] = "MJ1 Zone";
   $response[0]['table'][0]['table_name']   = "TBL 11";
   $response[0]['table'][0]['table_id']     = 1;
   $response[0]['table'][1]['table_name']   = "TBL 12";
   $response[0]['table'][1]['table_id']     = 2;
   $response[0]['table'][2]['table_name']   = "TBL 13";
   $response[0]['table'][2]['table_id']     = 3;
   $response[0]['table'][3]['table_name']   = "TBL 14";
   $response[0]['table'][3]['table_id']     = 4;
   $response[0]['zone_id'] = 1;

   $response[1]['zone'] = "SJ1 Zone";
   $response[1]['table'][0]['table_name']   = "TBL 21";
   $response[1]['table'][0]['table_id']     = 5;
   $response[1]['table'][1]['table_name']   = "TBL 22";
   $response[1]['table'][1]['table_id']     = 6;
   $response[1]['table'][2]['table_name']   = "TBL 23";
   $response[1]['table'][2]['table_id']     = 7;
   $response[1]['table'][3]['table_name']   = "TBL 24";
   $response[1]['table'][3]['table_id']     = 8;
   $response[1]['zone_id'] = 2;

   $response[2]['zone'] = "AJ1 Zone";
   $response[2]['table'][0]['table_name']   = "TBL 31";
   $response[2]['table'][0]['table_id']     = 9;
   $response[2]['table'][1]['table_name']   = "TBL 32";
   $response[2]['table'][1]['table_id']     = 10;
   $response[2]['table'][2]['table_name']   = "TBL 33";
   $response[2]['table'][2]['table_id']     = 11;
   $response[2]['table'][3]['table_name']   = "TBL 34";
   $response[2]['table'][3]['table_id']     = 12;
   $response[2]['zone_id'] = 3;

   $response[3]['zone'] = "RJ1 Zone";
   $response[3]['table'][0]['table_name']   = "TBL 41";
   $response[3]['table'][0]['table_id']     = 13;
   $response[3]['table'][1]['table_name']   = "TBL 42";
   $response[3]['table'][1]['table_id']     = 14;
   $response[3]['table'][2]['table_name']   = "TBL 43";
   $response[3]['table'][2]['table_id']     = 15;
   $response[3]['table'][3]['table_name']   = "TBL 44";
   $response[3]['table'][3]['table_id']     = 16;
   $response[3]['zone_id'] = 4;

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


<?php
$json = file_get_contents('php://input');
$values = json_decode($json, true);

if(isset($values['jvalue'])){
   if(isset($values['jvalue']['placeorder'])){
      
      $placeorder = $values['placeorder'];
      
      if(isset($placeorder['zone_id'])){
         if(isset($placeorder['table_id'])){
            if(sizeof($placeorder['dishes']) > 0){
               $response["response"] = 200;
               $response["restaurant_id"] = "1";
               $response["order_confirmed"] = "1";
            }
            else{
               $response['error_code'] = 3;
               $response['message'] = 'dishes are missing';
            }
         }
         else{
            $response['error_code'] = 3;
            $response['message'] = 'table_id is missing';
         }
      }
      else{
         $response['error_code'] = 3;
         $response['message'] = 'zone_id is missing';     
      }
   }
   else{
       $response['error_code'] = 3;
       $response['message'] = 'placeorder is missing';
   }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'jvalue is missing';
}

echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
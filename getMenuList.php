<?php

$row = 1;
$original_arr= array();
$cat = array();
$response = array();
$cat_arr = ['Starters', 'Homemade Soups','Salads','Burger, sandwich & wrap','Tacos','Pasta','Risotto','Pizza','From the grill','Temptations','Mocktail Bar','Shake me up & Icecream Sundaes','Sundae','The cool byli boy','The hot byli girl','Open omelettes'];
$row = 0;

for($i = 0 ; $i < sizeof($cat_arr); $i++){
    $response[$i]['category'] = (string)$cat_arr[$i];
    $response[$i]['item'] = array();
}
if(!isset($_REQUEST['staff_id'])){
    if (($handle = fopen("items.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row == 0){
            $row++;
            continue;
        }
        $vnv = 'Veg';
        $num = count($data);
        $row++;
        //print_r($data);
        $cat_id = 0;
        for($i = 0; $i < sizeof($response); $i++){
            if($data[0] == $response[$i]['category']){
                $row_data['id'] = $data[8];
                $row_data['item_name'] = $data[2];
                $row_data['item_price'] = $data[3];
                $row_data['item_type'] = $data[7];
                array_push($response[$i]['item'], $row_data);
                break;
            }
        }
      }

      fclose($handle);
    }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
}
    echo json_encode($response,JSON_UNESCAPED_SLASHES);





exit();

?>
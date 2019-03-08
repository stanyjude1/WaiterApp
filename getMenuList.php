<?php

$row = 1;
$original_arr= $add_on_arr = array();
$cat = array();
$response = array();
$cat_arr = ['Starters', 'Homemade Soups','Salads','Burger, sandwich & wrap','Tacos','Pasta','Risotto','Pizza','From the grill','Temptations','Mocktail Bar','Shake me up & Icecream Sundaes','Sundae','The cool byli boy','The hot byli girl','Open omelettes'];
$row = 0;
$row1 = 0;

if(isset($_REQUEST['staff_id'])){
    for($i = 0 ; $i < sizeof($cat_arr); $i++){
    $response[$i]['category'] = (string)$cat_arr[$i];
    $response[$i]['item'] = array();
    }

    if(($handle1 = fopen("sugg_addons.csv", "r")) !== FALSE){
        while(($data1 = fgetcsv($handle1, 1000, ",")) !== FALSE){
            if($row1 == 0){
                $row1++;
                continue;
            }
            array_push($add_on_arr, $data1);
            $row1++;
        }
    }

    //print_r($add_on_arr);

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

                for($k = 0 ; $k < sizeof($add_on_arr); $k++){
                    if($row_data['item_name'] == $add_on_arr[$k][0]){
                        if(!isset($row_data['addons'])){
                            $row_data['addons'] = array();
                        }
                        $addon['id']            = $add_on_arr[$k][5];
                        $addon['addon_name']    = $add_on_arr[$k][1];
                        $addon['addon_price']   = $add_on_arr[$k][2];
                        $addon['addon_type']    = $add_on_arr[$k][4];
                        array_push($row_data['addons'], $addon);
                    }
                }
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
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
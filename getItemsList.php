<?php

$row = 1;
$original_arr= $add_on_arr = array();
$cat = array();
$response = array();
$cat_arr = ['Starters', 'Homemade Soups','Salads','Burger, sandwich & wrap','Tacos','Pasta','Risotto','Pizza','From the grill','Temptations','Mocktail Bar','Shake me up & Icecream Sundaes','Sundae','The cool byli boy','The hot byli girl','Open omelettes'];
$row = 0;
$row1 = 0;

if(!isset($_REQUEST['staff_id'])){
    $response["code"] = 200;
    $response["response"] = array();
    for($i = 0; $i < sizeof($cat_arr); $i++){
        $category_name["RestaurantMenu"][$i]["id"]          = (string)($i+1);
        $category_name["RestaurantMenu"][$i]["name"]        = $cat_arr[$i];
        $category_name["RestaurantMenu"][$i]["description"] = "cat description";
        $category_name["RestaurantMenu"][$i]["created"]     = "2019-03-08 11:51:28";
        $category_name["RestaurantMenu"][$i]["restaurant_id"] = "2";
        $category_name["RestaurantMenu"][$i]["image"]       = "";
        $category_name["RestaurantMenu"][$i]["active"]      = "1";
        $category_name["RestaurantMenu"][$i]["has_menu_item"] = "1";
        $category_name["RestaurantMenu"][$i]["index"]       = (string)$i;
        $category_name["RestaurantMenu"][$i]["RestaurantMenuItem"] = array();
    }
    $response["response"][0] = $category_name;

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

    if (($handle = fopen("items.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //print_r($data);
            for($i = 0; $i < sizeof($response['response'][0]['RestaurantMenu']); $i++){
                if($data[0] == $response['response'][0]['RestaurantMenu'][$i]['name']){
                    $row_data['id']            = (string)$data[9];
                    $row_data['name']          = $data[2];
                    $row_data['description']   = $data[6];
                    $row_data['price']         = $data[4];

                    if($data[8] == "Non-Veg"){
                        $row_data['is_veg']     = "0";
                    }
                    else{
                        $row_data['is_veg']     = "1";
                    }

                    $row_data['created']       = "2019-03-12 11:45:20";
                    $row_data['active']        = "1";
                    $row_data['restaurant_menu_id'] = $data[9];
                    $row_data['out_of_order']  = "0";
                    $row_data['RestaurantMenuExtraSection'] = array();

                    if($data[3] != ''){
                        if(!isset($row_data['RestaurantMenuExtraSection'][0]['id']) && !isset($row_data['RestaurantMenuExtraSection'][1]['id'])){
                            $row_data['RestaurantMenuExtraSection'][0]['id'] = "991";
                            $row_data['RestaurantMenuExtraSection'][0]['name']                    = "Full";
                            $row_data['RestaurantMenuExtraSection'][0]['restaurant_id']           = "2";
                            $row_data['RestaurantMenuExtraSection'][0]['active']                  = "1";
                            $row_data['RestaurantMenuExtraSection'][0]['restaurant_menu_item_id'] = "4428";
                            $row_data['RestaurantMenuExtraSection'][0]['required']                = "1";
                            $row_data['RestaurantMenuExtraSection'][0]['RestaurantMenuExtraItem'] = array();

                            $row_data['RestaurantMenuExtraSection'][1]['id'] = "991";
                            $row_data['RestaurantMenuExtraSection'][1]['name']                 = "Additional";
                            $row_data['RestaurantMenuExtraSection'][1]['restaurant_id']           = "2";
                            $row_data['RestaurantMenuExtraSection'][1]['active']                  = "1";
                            $row_data['RestaurantMenuExtraSection'][1]['restaurant_menu_item_id'] = "4428";
                            $row_data['RestaurantMenuExtraSection'][1]['required']                = "1";
                            $row_data['RestaurantMenuExtraSection'][1]['RestaurantMenuExtraItem'] = array();
                        }
                        
                        if (($handle2 = fopen("items.csv", "r")) !== FALSE) {
                            while (($data2 = fgetcsv($handle2, 1000, ",")) !== FALSE) {
                                if($data2[2] == $row_data['name']){
                                    $row2_data['id'] = "1";
                                    $row2_data['name'] = $data2[3];
                                    $row2_data['price'] = (string)rand(50,150);
                                    $row2_data['created'] = "2019-03-08 11:55:50";
                                    $row2_data['active'] ="1";
                                    $row2_data['restaurant_menu_extra_section_id'] = (string)rand(900,1000);

                                    array_push($row_data['RestaurantMenuExtraSection'][0]['RestaurantMenuExtraItem'], $row2_data);
                                }
                            }
                            fclose($handle2);
                        }
                    }

                    for($j = 1; $j < sizeof($add_on_arr); $j++){
                        if($add_on_arr[$j][0] == $row_data['name']){

                            if(!isset($row_data['RestaurantMenuExtraSection'][0]['id']) && !isset($row_data['RestaurantMenuExtraSection'][1]['id'])){
                                $row_data['RestaurantMenuExtraSection'][0]['id'] = "991";
                                $row_data['RestaurantMenuExtraSection'][0]['name']                    = "Full";
                                $row_data['RestaurantMenuExtraSection'][0]['restaurant_id']           = "2";
                                $row_data['RestaurantMenuExtraSection'][0]['active']                  = "1";
                                $row_data['RestaurantMenuExtraSection'][0]['restaurant_menu_item_id'] = "4428";
                                $row_data['RestaurantMenuExtraSection'][0]['required']                = "1";
                                $row_data['RestaurantMenuExtraSection'][0]['RestaurantMenuExtraItem'] = array();

                                $row_data['RestaurantMenuExtraSection'][1]['id'] = "991";
                                $row_data['RestaurantMenuExtraSection'][1]['name']                 = "Additional";
                                $row_data['RestaurantMenuExtraSection'][1]['restaurant_id']           = "2";
                                $row_data['RestaurantMenuExtraSection'][1]['active']                  = "1";
                                $row_data['RestaurantMenuExtraSection'][1]['restaurant_menu_item_id'] = "4428";
                                $row_data['RestaurantMenuExtraSection'][1]['required']                = "1";
                                $row_data['RestaurantMenuExtraSection'][1]['RestaurantMenuExtraItem'] = array();
                            }
                            // print_r($row_data['name']." has an addon as ".$add_on_arr[$j][1]."<br>");
                            $row3_data['id'] = "1";
                            $row3_data['name'] = $add_on_arr[$j][1];
                            $row3_data['price'] = $add_on_arr[$j][2];
                            $row3_data['created'] = "2019-03-08 11:55:50";
                            $row3_data['active'] ="1";
                            $row3_data['restaurant_menu_extra_section_id'] = (string)rand(900,1000);

                            array_push($row_data['RestaurantMenuExtraSection'][1]['RestaurantMenuExtraItem'], $row3_data);

                        }
                    }

                    array_push($response['response'][0]['RestaurantMenu'][$i]['RestaurantMenuItem'], $row_data);
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
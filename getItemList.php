<?php

$row = 1;
$original_arr = $original_arr_temp = $cat = $cusine = $price = $desc = $item = $food = $veg = $priority = $json = array();
$category_name = '';

if(isset($_REQUEST['staff_id'])){
    if(!isset($_REQUEST['branch_id'])){
        $response['error_code'] = 3;
        $response['message'] = 'branch_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
    
    if(isset($_REQUEST['category_id'])){

        if (($handle = fopen("category.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                $num = count($data);
                $row++;
                array_push($original_arr, $data);
                array_push($cat, $data[0]);
            }

            fclose($handle);
            
            $cat = array_unique($cat);
            $temp = array();
            
            for($i = 1; $i < sizeof($cat); $i++)
            {
              $temp[] = ["id" => (string)$i, "category" => $cat[$i]];
            }

            $response_temp["FoodItemCategory"] = $temp;
        }

    for($i = 0; $i < sizeof($response_temp['FoodItemCategory']); $i++){
        if((int)$response_temp['FoodItemCategory'][$i]['id'] == (int)$_REQUEST['category_id']){
            $category_name = $response_temp['FoodItemCategory'][$i]['category'];
            break;
        }
    }

    if($category_name == ''){
        $response['error_code'] = 6;
        $response['message'] = 'invalid category_id';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }

    $row = 1;

    if(($handle = fopen("items.csv", "r")) !== FALSE) {        
        while (($data = fgetcsv($handle)) !== FALSE) {
            $num = count($data);
            $row++;
            if($category_name == $data[0]){
                array_push($original_arr_temp, $data);
                array_push($cat, $data[0]);
                array_push($cusine, $data[1]);
                array_push($item, $data[2]);
                array_push($price, $data[3]);
                array_push($desc, $data[5]);
                array_push($food, $data[6]);
                if($data[7] == "Veg"){
                    array_push($veg, "V");
                }
                else{
                    array_push($veg, "NV");
                }
                array_push($priority, $data[8]);
            }
        }

    fclose($handle);
    }
    
    for($i = 0; $i < sizeof($original_arr_temp); $i++)
    {

      $json[]=["id"=>(int)$i,"item_code"=>(int)$i,"item_category"=>$cat[$i],"item_name"=>$item[$i],"item_price"=>(string)$price[$i],"item_gst"=>"5%","item_type"=>$food[$i],"item_genre"=>$veg[$i]];
    }

    $response_final = json_encode(array("FoodItemDetails"=>$json, 'response'=>200));
    echo $response_final;
    exit();
    }
    else{
        $response['error_code'] = 5;
        $response['message'] = 'category_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
    exit();
}
    
   
    
    
?>
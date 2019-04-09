<?php

$row = 1;
$original_arr= $add_on_arr = $item = array();
$cat = array();
$response = array();
$cat_arr = array("KABAB’S", "BIRYANI", "CHINESE", "GRAVY", "ROTIS", "MUTTON", "BONELESS", "SEAFOOD", "ROLLS", "VEGETARIAN", "SNACKERS", "TANDOORI");
$row = 0;
$row1 = 0;

if(!isset($_REQUEST['branch_id'])){
    $response['error_code'] = 3;
    $response['message'] = 'branch_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
    exit();
}

if(!isset($_REQUEST['cat_id'])){
    $response['error_code'] = 4;
    $response['message'] = 'cat_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
    exit();
}
else{
    $cat_id = (int)$_REQUEST['cat_id'];
    if($cat_id <= sizeof($cat_arr)){
        $cat_name = $cat_arr[$cat_id - 1];
    }
    else{
        $response['error_code'] = 4;
        $response['message'] = 'invalid cat_id is missing';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
}

if(isset($_REQUEST['staff_id'])){
    if($cat_id != 0){

    if(($handle = fopen("MMA.csv", "r")) !== FALSE) {        
        while (($data = fgetcsv($handle)) !== FALSE) {
            $num = count($data);
            $row++;
            if($cat_name == $data[0]){
                $temp["branch_id"]          = "1";
                $temp["category_name"]      = $cat_name;
                $temp["cuisine_name"]       = "Indian";
                $temp["item_id"]            = $row;
                $temp["category_id"]        = $cat_id;
                $temp["cuisne_id"]          = "1";
                $temp["item_name"]          = (string)$data[1];
                $temp["item_price"]         = (string)$data[2];
                $temp["item_desc"]          = "item description";
                $temp["active_status"]      = "1";
                $temp["item_foodtype"]      = "Non-Veg";
                $temp["isaddon"]            = "0";
                $temp["recommented_item"]   = "0";
                $temp["category_active_status"] = "1";
                $temp["cuisine_active_status"] = "1";
                $temp["count"] = "100";
                $temp["item_image"] = "";
                $temp["available_order_cnt"] = null;
                $temp["addons"] = array();
                $temp["priority"] ="0";

                array_push($original_arr, $temp);
            }
        }

    fclose($handle);
    }
    $response["item_menu"] = $original_arr;
    $response["msg"] = "Success";
    $response["status"] = 1;
}

if($cat_id == 0){
    if(($handle = fopen("MMA.csv", "r")) !== FALSE) {        
        while (($data = fgetcsv($handle)) !== FALSE) {
            $num = count($data);
            $row++;
            
            $temp["branch_id"]          = "1";
            $temp["category_name"]      = $data[0];
            $temp["cuisine_name"]       = "Indian";
            $temp["item_id"]            = $row;
            $temp["category_id"]        = "0";
            $temp["cuisne_id"]          = "1";
            $temp["item_name"]          = (string)$data[1];
            $temp["item_price"]         = (string)$data[2];
            $temp["item_desc"]          = "item description";
            $temp["active_status"]      = "1";
            $temp["item_foodtype"]      = "Non-Veg";
            $temp["isaddon"]            = "0";
            $temp["recommented_item"]   = "0";
            $temp["category_active_status"] = "1";
            $temp["cuisine_active_status"] = "1";
            $temp["count"] = "100";
            $temp["item_image"] = "";
            $temp["available_order_cnt"] = null;
            $temp["addons"] = array();
            $temp["priority"] ="0";

            array_push($original_arr, $temp);
        }

    fclose($handle);
    }
    $response["item_menu"] = $original_arr;
    $response["msg"] = "Success";
    $response["status"] = 1;
}
}

else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
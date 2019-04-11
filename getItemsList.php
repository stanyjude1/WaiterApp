<?php
include "connPDO.php";
$row = 1;
$original_arr= $add_on_arr = $item = array();
$cat_arr = array();
$cat = array();
$response = array();
$stmt = $conn->prepare("Select category,id from categories");
$stmt->execute();
$result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row=$stmt->fetchAll();
foreach ($row as $content) {
    $cat_arr=$content['category'];
}

$itemId = 0;
$row1 = 0;

if(!isset($_REQUEST['cat_id'])){
    $response['error_code'] = 4;
    $response['message'] = 'cat_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
    exit();
}
else{
    $cat_id = (int)$_REQUEST['cat_id'];
    $stmt = $conn->prepare("Select * from categories where id=\"$cat_id\"");
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);  
    $row=$stmt->fetchAll();
    if($row!=null) {
        $cat_name = $row[0]['category'];
    }
    else{
        $response['error_code'] = 4;
        $response['message'] = 'cat_id is Invalid';
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit();
    }
}

if(isset($_REQUEST['staff_id'])){
    $staff_id = (int)$_REQUEST['staff_id'];
    $stmt = $conn->prepare("Select * from users where id=\"$staff_id\"");   
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row=$stmt->fetch();
    if($row!=null){
        if($cat_id != 0){

            if(($handle = fopen("MMA.csv", "r")) !== FALSE) {        
                while (($data = fgetcsv($handle)) !== FALSE) {
                    $num = count($data);
                    if($cat_name == $data[0]){
                        
                        $itemId++;
                        $temp["branch_id"]          = $row['branch_id'];
                        $temp["category_name"]      = $cat_name;
                        $temp["cuisine_name"]       = "Indian";
                        $temp["item_id"]            = $itemId;
                        $temp["category_id"]        = $cat_id;
                        $temp["cuisne_id"]          = "1";
                        $temp["item_name"]          = (string)$data[1];
                        $temp["item_price"]         = (string)$data[2];
                        $temp["item_desc"]          = "item description";
                        $temp["active_status"]      = "1";
                        $temp["item_foodtype"]      = "Non-Veg";
                        $temp["isaddon"]            = "0";
                        $temp["recommended_item"]   = "0";
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
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is Invalid';
}

}

else{
    $response['error_code'] = 4;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
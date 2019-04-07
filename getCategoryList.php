<?php

$row = 1;
$original_arr= array();
$cat = array();
$cat_arr = array("KABAB’S", "BIRYANI", "CHINESE", "GRAVY", "ROTIS", "MUTTON", "BONELESS", "SEAFOOD", "ROLLS", "VEGETARIAN", "SNACKERS", "TANDOORI");

if(isset($_REQUEST['staff_id'])){
    $i = 1;
    $j = 0;
    $temp = array();
    foreach ($cat_arr as $catname) {
        $temp[$j]=["cid"=>(int)$i,"cname"=>$catname, "cdesc"=>"","image_path"=>"","priority"=>"0"];
        $i++;
        $j++;        
    }

    $response["category_list"] = $temp;
    $response["recommendItem"] = "0";
    $response["tdySplItem"] = "0";
    $response["msg"] = "Success";
    $response["status"] = 1;

    $response=json_encode($response);
    echo $response;
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
}

exit();

?>
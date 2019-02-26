<?php

$row = 1;
$original_arr= array();
$cat = array();

if(isset($_REQUEST['staff_id'])){
    if (($handle = fopen("category.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $num = count($data);
            $row++;
            array_push($original_arr, $data);
            array_push($cat, $data[0]);
            
        }
        fclose($handle);
        $cat=array_unique($cat);
        $temp=array();
        
        for($i=1;$i<sizeof($cat);$i++)
        {

          $temp[]=["id"=>(int)$i,"category"=>$cat[$i]];
        }

        $response=json_encode(array("FoodItemCategory"=>$temp,'response'=>200));
        echo $response;
    }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
    echo json_encode($response,JSON_UNESCAPED_SLASHES);
}

exit();

?>
<?php
include "connPDO.php";
$i=0;
if(isset($_REQUEST['staff_id'])){
    $staff_id = (int)$_REQUEST['staff_id'];
    $stmt = $conn->prepare("Select * from users where id=\"$staff_id\"");   
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row=$stmt->fetch();
    if($row!=null){
        $stmt = $conn->prepare("Select * from categories");  
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);  
        $row=$stmt->fetchAll();
        foreach ($row as $content){
            $response['category_list'][$i]['cid']=$i;
            $response['category_list'][$i]['cname']=$content['category'];
            $response['category_list'][$i]['cdesc']="";
            $response['category_list'][$i]['image_path']="";
            $response['category_list'][$i]['priority']=0;
            $i++; 
        }
        $response["recommendItem"] = "0";
        $response["tdySplItem"] = "0";
        $response["msg"] = "Success";
        $response["status"] = 1;
    }else{
        $response['error_code'] = 2;
        $response['message'] = 'Invalid Staff ID';
    }
}
else{
    $response['error_code'] = 3;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
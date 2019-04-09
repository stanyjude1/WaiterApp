<?php
include "connPDO.php";
if(isset($_REQUEST['staff_id'])){
    $staff_id = (int)$_REQUEST['staff_id'];
    $stmt = $conn->prepare("Select * from users where id=\"$staff_id\"");   
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row=$stmt->fetch();
    if($row!=null){
        $response["DiningDetails"] = array();
        $stmt = $conn->prepare("Select t.name, t.id, t.table_capacity, b.net_total from tables t, bills b  where t.id=b.table_id");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row=$stmt->fetchAll();
        $j=0; 
        foreach ($row as $content){
            $names = range("A","Z");
            $ids = range(1,100);
            $table_details[$j]["table_name"] = $content['name'];
            $table_details[$j]["table_id"]   =  $content['id'];
            $table_details[$j]["capacity"] = $content['table_capacity'];
            $table_details[$j]["status"]     = "Active";
            $table_details[$j]["billamount"] = $content['net_total'];
            $j++;
        }
        $response["DiningDetails"] = $table_details;
        $response["response"] = 200;
        $response["restaurant_id"] = "1";
        $response["restaurant_name"] = "Karama Restaurant";
    }
    else{
        $response['error_code'] = 3;
        $response['message'] = 'staff_id is invalid';
    }
}
else{
    $response['error_code'] = 4;
    $response['message'] = 'staff_id is missing';
}
echo json_encode($response,JSON_UNESCAPED_SLASHES);
exit();

?>
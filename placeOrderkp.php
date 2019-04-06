<?php

if(isset($_REQUEST['jvalue'])){
	$jarray 	= $_REQUEST['jvalue'];
}

if($jarray != ''){
	$jsonDecoded =  json_decode($jarray);

	$placeorder = $jsonDecoded->placeorder;
	if($placeorder != ''){
		$response['orderid'] = rand(1,100);
		$response['kot'] = rand(1,100);
		$response['table_id'] = "TBL_01";
	}
	$order['Order_Info'] 		= $response;

	echo json_encode($order);
	exit();
}
else{
	$orderInfo['error']	= "1";
	$orderInfo['message']	    = "Failed";
	$order['Order_Info'] 		= $orderInfo;
	echo json_encode($order);
	exit();
}

?>
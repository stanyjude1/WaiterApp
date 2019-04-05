<?php

if(isset($_REQUEST['jvalue'])){
	$jarray 	= $_REQUEST['jvalue'];
}

if($jarray != ''){
	$jsonDecoded =  json_decode($jarray);

	$placeorder = $jsonDecoded->placeorder;
	$order['Order_Info'] 		= $placeorder;

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
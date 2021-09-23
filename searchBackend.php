<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once("config.php");

$link->set_charset("utf8");

$requestData= $_REQUEST;
 
//ฟิลด์ที่จะเอามาแสดงและค้นหา
$columns = array( 
// datatable column index  => database column name
	0 => 'cust_name', 
	1 => 'room_num',
    2 => 'type_name',
	3 => 'check_in',
	4 => 'check_out',
    5 => 'amount',
    6 => 'total',
    7 => 'payment_status',
    8 => 'booking_status'
);

$search = "";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$search.=" AND ";
    $search.= "cust_name LIKE '%".$requestData['search']['value']."%' ";
}
// getting total number records without any search
$query = "SELECT count(*) AS num_rows ";
$query.=" FROM booking as b join customer as c on b.cus_id = c.cus_id
        join booking_detail as bd on b.booking_id = bd.booking_id
        join room as r on bd.room_id = r.room_id
        join room_type as rt on r.room_type_id = rt.room_type_id WHERE 1=1 ".$search;

$getRes = $link->query($query);
$row = $getRes->fetch_assoc();
$totalData = $row['num_rows'];
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
 
$query = "SELECT c.cust_name, r.room_num, rt.type_name, b.check_in, b.check_out, b.amount, b.total, b.payment_status, b.booking_status ";
$query.=" FROM booking as b join customer as c on b.cus_id = c.cus_id
        join booking_detail as bd on b.booking_id = bd.booking_id
        join room as r on bd.room_id = r.room_id
        join room_type as rt on r.room_type_id = rt.room_type_id WHERE 1=1 ".$search;
		
$getRes = $link->query($query);
$data = array();

while($row = $getRes->fetch_assoc())
{
	$nestedData=array(); 
	foreach($columns as $columnname)
	{
		$nestedData[] = $row[$columnname];
	}	
	$data[] = $nestedData;
}
 
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
 
echo json_encode($json_data);  // send data as json format

?>
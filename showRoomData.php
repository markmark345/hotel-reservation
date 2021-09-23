<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once("config.php");


$link->set_charset("utf8");

$requestData= $_REQUEST;
 
//ฟิลด์ที่จะเอามาแสดงและค้นหา
$columns = array( 
// datatable column index  => database column name
	0 =>'room_num', 
	1 => 'type_name',
	2=> 'area_size',
	3=> 'num_of_bed',
    4 => 'price',
    5 => 'room_status'
);

$begin_date = $requestData['begin_date'];
$end_date = $requestData['end_date'];

$search = "";	
$search2 = "";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$search2.=" AND ";
    $search2.= "type_name LIKE '%".$requestData['search']['value']."%' ";
}
//getting total number records without any search

if (!empty($begin_date) && !empty($end_date)) {
	$search = " and room_id not in ( ".
			" SELECT DISTINCT bd.room_id ".
			" FROM booking_detail as bd ".
			" join booking as b on bd.booking_id = b.booking_id ".
			" join room as r on bd.room_id = r.room_id ".
			" join room_type as rt on r.room_type_id = rt.room_type_id ".
			"	where (b.check_in >= '".$begin_date."' and b.check_out <= '".$end_date."') ".
			"	and b.booking_status = 2 ".
			"	ORDER by r.room_id) ";
	error_log(print_r($search, TRUE)); 
} 
$query = "SELECT count(*) AS num_rows ";
$query.=" FROM room JOIN room_type ON room.room_type_id = room_type.room_type_id WHERE 1=1 ".$search2.$search;
		error_log(print_r($query, TRUE)); 
$getRes = $link->query($query);
$row = $getRes->fetch_assoc();
$totalData = $row['num_rows'];
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
 
$query = "SELECT ".implode(",",$columns);
$query.=" FROM room JOIN room_type ON room.room_type_id = room_type.room_type_id WHERE 1=1 ".$search2.$search;
error_log(print_r($query, TRUE)); 

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
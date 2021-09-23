<?php
require_once("config.php");

// Taking all 5 values from the form data(input)
$cus_name =  $_REQUEST['cus_name'];
$phone = $_REQUEST['phone'];
$citi_id =  $_REQUEST['citi_id'];
$email = $_REQUEST['email'];
$check_in = $_REQUEST['check_in'];
$check_out = $_REQUEST['check_out'];
$room_num = $_REQUEST['room_num'];
$breakfast = $_REQUEST['breakfast'];  
$amount = $_REQUEST['amount'];  
$ser_name = $_REQUEST['ser_name'];
$discount = $_REQUEST['discount'];

// Performing insert query execution
// here our table name is college

$sql_room_info = "SELECT room_id, price from room as r where r.room_num = " . $room_num;
echo $sql_room_info ;
$result = $link->query($sql_room_info);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $price =  $row["price"];
        $room_id = $row["room_id"];
        break;
    }
  } else {
    echo "0 results";
  }
  
  $ser_price = 0;
  echo $ser_name;
$check_service = "SELECT service_id, ser_price from service as s where s.ser_name = '" .$ser_name."'";
echo $check_service ;
$result = $link->query($check_service);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $ser_price = $row['ser_price'];
        $service_id = $row['service_id'];
        break;
    }
    echo $ser_price;
    echo $service_id;
  } else {
    echo "0 results";
  }

$before_tax = $ser_price - $discount;
$tax = ($before_tax * 7) / 100;
$total = $price + $tax;

$cus_id = -1;
$payment_type_id = 1;
$sql = "INSERT INTO customer(cust_name, phone, citizen_id, email)  VALUES ('$cus_name', '$phone','$citi_id','$email')";

if(mysqli_query($link, $sql)){
    $cus_id = $link->insert_id;
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($link);
}

$sql2 = "INSERT INTO booking(check_in, check_out, amount, cus_id, payment_type_id, total, tax) VALUES ('$check_in', '$check_out', '$amount', '$cus_id', '$payment_type_id', '$total', '$tax')";

if(mysqli_query($link, $sql2)){
    $booking_id = $link->insert_id;
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($link);
}

$book_service_sql = "INSERT INTO booking_service(booking_id, service_id)  VALUES ($booking_id, $service_id)";
if(mysqli_query($link, $book_service_sql)){
    $book_service = $link->insert_id;
} else{
    echo "ERROR: Hush! Sorry $book_service_sql. " 
        . mysqli_error($book_service_sql);
}

$sql3 = "INSERT INTO booking_detail(include_break_fast, booking_id, room_id, price) VALUES ('$breakfast', '$booking_id', '$room_id', '$price')";
  
if(mysqli_query($link, $sql3)){

} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($link);
}

$_SESSION["cus_name"] = $cus_name;
$_SESSION["phone"] =  $phone;
$_SESSION["citi_id"] = $citi_id;
$_SESSION["check_in"] =  $check_in;
$_SESSION["check_out"] =  $check_out;
$_SESSION["amount"] =  $amount;
$_SESSION["breakfast"] =  $breakfast;
$_SESSION["room_num"] =  $room_num;

$room_avaiable_insert = "INSERT INTO room_available(check_in, check_out, room_id) VALUES ('$check_in', '$check_out', '$room_id')";

if(mysqli_query($link, $room_avaiable_insert)){
    
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking successfully</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <center>
    <a href="welcome.php" class="btn btn-warning">ข้อมูลห้องพัก</a>
    </center>
</body>
</html>




<?php

require_once("config.php");

// Taking all 5 values from the form data(input)
$room_num =  $_REQUEST['room_num'];
$action =  $_REQUEST['action'];


if ($action == 2 ) {
  $check_in_status = "SELECT b.booking_id, r.room_id";
  $check_in_status.= " FROM booking_detail as bd join booking as b on bd.booking_id = b.booking_id
              join room as r on bd.room_id = r.room_id
              where b.booking_status = 0 and r.room_num = ".$room_num;

 // echo $check_in_status;
  $result = $link->query($check_in_status);
  //echo "a ".$result."aaaS";
 
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $booking_id =  $row["booking_id"];
          $room_id = $row["room_id"]; 
          //echo  $booking_id."\n";
          break;
      }
    } else {
      //echo "0 results";
    }

  $book_update = "UPDATE booking SET booking_status = ".$action." WHERE booking_id = ".$booking_id;
 // echo $book_update;
  if(mysqli_query($link, $book_update)){
      
  } else{
      echo "ERROR: Hush! Sorry $book_update. " 
          . mysqli_error($link);
  }

$room_update = "UPDATE room SET room_status = 1 WHERE room_id = " .$room_id ;

if ($link->query($room_update) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}

}

if ($action == 1 || $action == 3) {
  $prev_status = -1;
  if ($action == 1) {
    $prev_status = 0;
  }
  elseif ($action == 3) {
    $prev_status = 2;
  }
  echo $prev_status;
  $check_out_cancle_status = "SELECT b.booking_id, r.room_id";
  $check_out_cancle_status.= " FROM booking_detail as bd join booking as b on bd.booking_id = b.booking_id
              join room as r on bd.room_id = r.room_id
              where b.booking_status = ".$prev_status." and r.room_num = ".$room_num;
  echo $check_out_cancle_status."\n";
  $result = $link->query($check_out_cancle_status);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $booking_id =  $row["booking_id"];
          $room_id = $row["room_id"];
          break;
      }
    } else {
      echo "0 results";
    }
  
  $room_update = "UPDATE room SET room_status = 0 WHERE room_id = " .$room_id ;

  if(mysqli_query($link, $room_update)){
      
  } else{
      echo "ERROR: Hush! Sorry $sql. " 
          . mysqli_error($link);
  }
  
  $book_update = "UPDATE booking SET booking_status = ".$action." WHERE booking_id = " .$booking_id ;

  if(mysqli_query($link, $book_update)){
    
  } else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($link);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancle successfully</title>
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

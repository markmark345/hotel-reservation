
<?php
//1. เชื่อมต่อ database:
include('config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//2. query ข้อมูลจากตาราง tb_member:
// $query = "SELECT room_status, room_num, room_id FROM room where room_status = 0 ORDER BY room_num asc" or die("Error:" . mysqli_error());
// //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
// $result = mysqli_query($link, $query);
$query2 = "SELECT ser_name FROM service ORDER BY service_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result2 = mysqli_query($link, $query2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
		integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" 
    integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h3>KAMPAI HOTEL</h3></a>
            <div class="collapse navbar-collapse" id="navbarColor01">
            <div class="navbar-nav"  >
                <a class="nav-link active" aria-current="page" href="welcome.php">ข้อมูลห้องพัก	</a>
                <a class="nav-link active" href="Booking.php">จองห้องพัก</a>
                <a class="nav-link active" href="search.php">ค้นหารายชื่อลูกค้า</a>
                <a class="nav-link active" href="logout.php" tabindex="-1" aria-disabled="true">ออกจากระบบ</a>
            </div>
        </div>
            <div class="d-flex">
                <div class="row">
                    <div class="col">	
                        <p style="color: white; padding-top: 15px"><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
                    </div>
                    <div class="col" >
                        <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container" style="padding-top: 50px">
        <form action="bookinInfo.php" class="needs-validation g-3" method="post">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Customer Info</h5>
                            <p>
                                <label for="Name">ชื่อลูกค้า</label>
                                <input type="text" name="cus_name" id="cus_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </p>
                            <p>
                                <label for="phone">เบอร์โทร:</label>
                                <input type="text" name="phone" id="phone" class="form-control " required>
                                <div class="invalid-feedback">
                                    Please choose a phone number.
                                </div>
                            </p>   
                            <p>
                                <label for="citi_id">เลขบัตรประชาชน:</label>
                                <input type="text" name="citi_id" id="citi_id" class="form-control " required>
                                <div class="invalid-feedback">
                                    Please choose a citizen_id.
                                </div>
                            </p>
                            
                            <p>
                                <label for="email">Email Address:</label>
                                <input type="text" name="email" id="email" class="form-control " required>
                                <div class="invalid-feedback">
                                    Please choose a Email Address.
                                </div>
                            </p>   
                        </div>
                    </div>
                    </div>
                <div>
                    <div class="col">
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">Booking</h5>
                                <p>
                                    <label for="amount">จำนวนคนเข้าพัก</label>
                                    <input type="text" name="amount" id="amount" class="form-control " required>
                                    <div class="invalid-feedback">
                                        Please choose a Number of people staying.
                                    </div>
                                </p>
                                <p>
                                    <label for="check_in">Check-in</label>
                                    <input type="text" name="check_in" id="check_in" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please choose a heck-in.
                                    </div>
                                </p>   
                                <p>
                                    <label for="check_out">Check-out</label>
                                    <input type="text" name="check_out" id="check_out" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please choose a Check-out.
                                    </div>
                                </p>
                                <p>
                                    <label for="room_num">หมายเลขห้อง</label>
                                    <input type="text" name="room_num" id="room_num" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please choose a room number.
                                    </div>
                                </p>
                                <p>
                                    <label for="citi_id">ส่วนลด</label>
                                    <input type="numberic" name="discount" id="discount " value=0 class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please choose a discount.
                                    </div>
                                </p>
                                <p>
                                    <label for="Name">การบริการพิเศษ</label>
                                    <select name="ser_name" id='ser_name' class="form-control" style="width: 20rem;" class="form-control" required>
                                        <option value="">-Choose-</option>
                                            <?php foreach($result2 as $results2){?>
                                                <option value="<?php echo $results2["ser_name"];?>">
                                            <?php echo $results2["ser_name"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a service.
                                    </div>
                                </p>
                                <p>
                                    <label>Include breakfast
                                        <input type="checkbox" checked="checked" name="breakfast">
                                        <span class="checkmark"></span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                <div class="container">
                    <div class="row justify-content-end">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div> 
    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>


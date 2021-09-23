<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
		integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" 
		integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" language="javascript" >
        $(document).ready(function() {
            var dataTable = $('#room-grid').DataTable( {
                "processing": true,
                "serverSide": true,
                "pageLength": 10,
                "ajax":{
                    url :"searchBackend.php", // json datasource
                    type: "post",  // method  , by default get    
                    done: function(){ console.log("done"); },                  
                    error: function(){  // error handling
                        $(".customer-grid-error").html("");
                        $("#room-grid").append('<tbody class="customer-grid-error"><tr><th colspan="3">Not found</th></tr></tbody>');
                        $("#room-grid_processing").css("display","none");
                        
                    }
                }
            } );
        } );
    </script>
    

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
    <div class="container-fluid" style="padding-top: 50px">
        <table id="room-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
            <thead>
                <tr>
                    <th>ชื่อผู้เข้าพัก</th>
                    <th>เลขห้องพัก</th>
                    <th>ประเภทห้องพัก</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>จำนวนผู้เข้าพัก</th>
                    <th>จำนวนเงินที่ต้องชำระ</th>
                    <th>สถานะการชำระเงิน</th>	
                    <th>สถานะการจอง</th>	
                </tr>
            </thead>
        </table>
        <form action="cancleBBooking.php" method="post">
            
            <div class="form-row align-items-center">
                <div class="col-sm-2 my-1">
                    <label class="sr-only" for="room_num">กรอกหมายเลขห้อง</label>
                    <input type="text" class="form-control" name = "room_num" id="room_num" placeholder="กรอกหมายเลขห้อง">
                </div>
                <div class="col-auto my-1">
                    <label class="sr-only" for="room_num">ดำเนินการ</label>
                    <select class="custom-select" id="inputGroupSelect01" name="action">
                        <option selected>ดำเนินการ...</option>
                        <option value="1">ยกเลิกการจอง</option>
                        <option value="2">check-in</option>
                        <option value="3">check-out</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
            <div class="read_descip">
            <br>
                    <a>สถานะการจอง: </a>
                    <a> 0 = ยังไม่มีข้อมูล, </a>
                    <a> 1 = ยกเลิกการจอง, </a>
                    <a> 2 = Ckeck in, </a>
                    <a> 3 = Check out</a>
            </div>
        </form>
    </div> 
</body>
</html>
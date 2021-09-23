<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
	<title>Datatable Demo </title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
		integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" 
		integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style>
    	</style> 
	</head>
	<body>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid" >
					<a class="navbar-brand" href="#"><h3 >KAMPAI HOTEL</h3></a>
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
					<div class="row">
						<tr>
						<div class="col-md-2">
							<input type="text" name="begin_date" id="begin_date" class="form-control" autocomplete="off"  placeholder="Check-in-Date" />
						</div>
						</td>
						
						<div class="col-md-2">
							<input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off"  placeholder="Check-out-Date" />
						</div>
						<div class="col-md-1">
							<input type="button" name="search" id="search" value="Search" class="btn btn-primary" />
						</div>
						</tr>
					</div>
				</div>
				<div class="container-fluid">
					<br>
					<table id="room-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%" style="font-size: 18px">
						<thead>
							<tr>
								<th>เลขห้องพัก</th>
								<th>ประเภทห้องพัก</th>
								<th>ขนาดห้อง</th>
								<th>จำนวนเตียง</th>
								<th>ราคาห้องพัก</th>
								<th>สถานะของห้้องพัก</th>	
							</tr>
						</thead>
					</table>
					<form>
						<div style="font-size: 15px ;">
							<div class="read_descip">
								<a class ="free_text">สถานะของห้องพัก</a>
								<a >0 =  </a><a class ="free_text">ว่าง</a> 
								<a > 1 = </a><a class="notfree_txet">ไม่ว่าง</a>
							</div>
						</div>
					</form>
				</div>
			<script>
			$(document).ready(function() {

				$('#begin_date').datepicker({
					todayBtn:'linked',
					format: "yyyy-mm-dd",
					autoclose: true
				});
				$('#end_date').datepicker({
					todayBtn:'linked',
					format: "yyyy-mm-dd",
					autoclose: true
				});
				fetch_data();

				function fetch_data(startDate = '', endDate = '') {
					var dataTable = $('#room-grid').DataTable( {
						"processing": true,
						"serverSide": true,
						"pageLength": 10,
						"order": [],
						"ajax":{
							url :"showRoomData.php", 
							type: "post",  
							'data':{
								begin_date:startDate,
								end_date:endDate },   
							done: function(){ console.log("done"); },                  
							error: function(){  
								console.log("error in ajax");
								$(".customer-grid-error").html("");
								$("#room-grid").append('<tbody class="customer-grid-error"><tr><th colspan="3">Not found</th></tr></tbody>');
								$("#room-grid_processing").css("display","none");
							}
						}
					});
				}
				
				function getDate(){
					var today = new Date();
					document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
				}
				$('#search').click(function(){
					var begin_date = $('#begin_date').val();
					var end_date = $('#end_date').val();
					if(begin_date != '' && end_date !='')
					{
						$('#room-grid').DataTable().destroy();
						fetch_data(begin_date, end_date);
					}
					else
					{
						alert("Both Date is Required");
					}
				}); 
			});
		</script>
	</body>
</html>
 

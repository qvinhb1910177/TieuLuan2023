<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$roomtitle=$_POST['roomtitle'];
$typeroom=$_POST['typeroomname'];
$roomoverview=$_POST['roomorcview'];
$priceperday=$_POST['priceperday'];
$colortype=$_POST['colortype'];
$numberbed=$_POST['numberbed'];
$numberpeople=$_POST['numberpeople'];
$airconditioner=$_POST['airconditioner'];
$powerdoorlocks=$_POST['powerdoorlocks'];
$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$driverairbag=$_POST['driverairbag'];
$passengerairbag=$_POST['passengerairbag'];
$powerwindow=$_POST['powerwindow'];
$cdplayer=$_POST['cdplayer'];
$centrallocking=$_POST['centrallocking'];
$crashcensor=$_POST['crashcensor'];
$leatherseats=$_POST['leatherseats'];
$id=intval($_GET['id']);

$sql="update tblrooms set RoomsTitle=:roomtitle,RoomsTyperoom=:typeroom,RoomsOverview=:roomoverview,PricePerDay=:priceperday,ColorType=:colortype,NumberBed=:numberbed,NumberPeople=:numberpeople,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':roomtitle',$roomtitle,PDO::PARAM_STR);
$query->bindParam(':typeroom',$typeroom,PDO::PARAM_STR);
$query->bindParam(':roomoverview',$roomoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':colortype',$colortype,PDO::PARAM_STR);
$query->bindParam(':numberbed',$numberbed,PDO::PARAM_STR);
$query->bindParam(':numberpeople',$numberpeople,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
$query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
$query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
$query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
$query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
$query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
$query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
$query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
$query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
$query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
$query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Hotel-QuangVinh</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Room</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblrooms.*,tbltyperooms.TyperoomName,tbltyperooms.id as bid from tblrooms join tbltyperooms on tbltyperooms.id=tblrooms.RoomsTyperoom where tblrooms.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Tên Phòng<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="roomtitle" class="form-control" value="<?php echo htmlentities($result->RoomsTitle)?>" required>
</div>
<label class="col-sm-2 control-label">Loại Phòng<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="typeroomname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->TyperoomName); ?> </option>
<?php $ret="select id,TyperoomName from tbltyperooms";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->TyperoomName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->TyperoomName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Tổng Quan<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="roomorcview" rows="3" required><?php echo htmlentities($result->RoomsOverview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Giá / ngày<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" required>
</div>
<label class="col-sm-2 control-label">Màu Sắc<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="colortype" required>
<option value="<?php echo htmlentities($result->ColorType);?>"> <?php echo htmlentities($result->ColorType);?> </option>

<option value="Tươi Sáng">Tươi Sáng</option>
<option value="Trung tính">Trung tính</option>
<option value="Tối">Tối</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">number bed<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="numberbed" class="form-control" value="<?php echo htmlentities($result->NumberBed);?>" required>
</div>
<label class="col-sm-2 control-label">Số người tối đa<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="numberpeople" class="form-control" value="<?php echo htmlentities($result->NumberPeople);?>" required>
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Ảnh Phòng</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Ảnh 1 <img src="img/roomimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Ảnh 1</a>
</div>
<div class="col-sm-4">
Ảnh 2<img src="img/roomimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Ảnh 2</a>
</div>
<div class="col-sm-4">
Ảnh 3<img src="img/roomimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Ảnh 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Ảnh 4<img src="img/roomimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Ảnh 4</a>
</div>
<div class="col-sm-4">
Ảnh 5
<?php if($result->Vimage5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/roomimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Ảnh 5</a>
<?php } ?>
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Tiện ích phòng</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<?php if($result->AirConditioner==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
<label for="inlineCheckbox1"> Máy lạnh </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
<label for="inlineCheckbox1"> Máy lạnh </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->PowerDoorLocks==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
<label for="inlineCheckbox2"> Máy Quạt </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
<label for="inlineCheckbox2"> Máy Quạt </label>
</div>
<?php }?>
</div>
<div class="col-sm-3">
<?php if($result->AntiLockBrakingSystem==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
<label for="inlineCheckbox3"> Wifi Miễn Phí </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
<label for="inlineCheckbox3"> Wifi Miễn Phí </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BrakeAssist==1)
{
	?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
<label for="inlineCheckbox3"> Bể bơi </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
<label  for="inlineCheckbox3"> Bể bơi </label>
</div>
<?php } ?>
</div>
</div><!-- sdgadkjh -->
<div class="form-group">

<div class="col-sm-3">
<?php if($result->PowerSteering==1)
{
	?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
<label for="inlineCheckbox1"> Lò sưởi </label>
</div>
<?php } else {?>


<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
<label for="inlineCheckbox1"> Lò sưởi </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->DriverAirbag==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
<label for="inlineCheckbox2">Cà Phê Miễn Phí</label>
</div>
<?php } else { ?>

<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
<label for="inlineCheckbox2">Cà Phê Miễn Phí</label>
<?php } ?>
</div>
</div><!-- sdgadkjh -->
<div class="col-sm-3">
<?php if($result->DriverAirbag==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
<label for="inlineCheckbox3"> Nhà hàng và quầy bar </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
<label for="inlineCheckbox3"> Nhà hàng và quầy bar </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->PowerWindows==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
<label for="inlineCheckbox3"> TV </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
<label for="inlineCheckbox3"> TV </label>
</div>
<?php } ?>
</div>
</div><!-- sdgadkjh -->


<div class="form-group">
<div class="col-sm-3">
<?php if($result->CDPlayer==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
<label for="inlineCheckbox1"> Tủ lạnh </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
<label for="inlineCheckbox1"> Tủ lạnh </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CentralLocking==1)
{
?>
<div class="checkbox  checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
<label for="inlineCheckbox2">Dịch vụ phòng hàng ngày</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
<label for="inlineCheckbox2">Dịch vụ phòng hàng ngày</label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CrashSensor==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
<label for="inlineCheckbox3"> Phòng Gym </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
<label for="inlineCheckbox3"> Phòng Gym </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->CrashSensor==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
<label for="inlineCheckbox3"> Tủ an toàn </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
<label for="inlineCheckbox3"> Tủ an toàn </label>
</div>
<?php } ?>
</div>


<?php }} ?>
</div>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
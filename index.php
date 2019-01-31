<?php
if(!isset($_POST['td'])){
	$td=date("Y-m-d");
}
else{
	$td=$_POST['td'];
}
date_default_timezone_set("Asia/Kolkata");
$conn=mysqli_connect('localhost','root','','time_mngmnt_db');
if(isset($_POST['tsk'])){
	$tsk=mysqli_escape_string($conn,$_POST['tsk']);
	$qry="INSERT INTO main_table(task) VALUES ('{$tsk}')";
	$result=mysqli_query($conn,$qry);
	$qry="SELECT * FROM main_table";
	$result=mysqli_query($conn,$qry);
	while($resultset=mysqli_fetch_assoc($result))
	{$id2incrmnt=$resultset['id']-1;}
	$tt=date('Y-m-d H:i:s');
	$qry="UPDATE main_table SET end_time='{$tt}' WHERE id='{$id2incrmnt}'";
	$result=mysqli_query($conn,$qry);
}
$qry="SELECT * FROM main_table";
$result=mysqli_query($conn,$qry);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Time management</title>
	<link rel="icon" href="./logo.png" type="image/png">
	<link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.min.css" >
	<script src="index.js"></script>

</head>
<body onload="startTime()" class="bg-secondary">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="javascript:void(0);">Current Time:&nbsp;<span id="tm"></span></a>
	  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	   </div>-->
	</nav>
	<div class="container-fluid m-0 p-0">
		<div class="table-responsive">
		<table class="table table-hover table-dark text-center">
  <thead>
    <tr>
      	<?php 
      	$i=0;
      	$j=1;
		if($result){
			while($resultset=mysqli_fetch_assoc($result))
      	{
      		if($i==0){
      			$originalDate=explode(" ",$resultset['strt_time']);
				$newDate = date("Y-m-d", strtotime($originalDate[0]));
				$mx_date = date('Y-m-d');
      			echo "<form action='./' method='POST'><th scope='col' colspan='3' style='font-size:1.5rem;'>Task Performed on date: </th><th colspan='1'><input type='date' min='".$newDate."' max='".$mx_date."' class='form-control' value='".$td."' name='td'></th><th colspan='1'><input type='submit' value='Refresh' class='form-control btn btn-primary'/></th></form>
    </tr>
  <tr>
      <th scope='col'>Sl. No.</th>
      <th scope='col'>Task</th>
      <th scope='col'>Start Time</th>
      <th scope='col'>End Time</th>
      <th scope='col'>Action</th>
    </tr>
  </thead>
  <tbody>";
      		}
      		$i++;
      		$dDate=explode(" ",$resultset['strt_time']);
			$dDate=date("Y-m-d", strtotime($originalDate[0]));
      			$srt_time=explode(" ",$resultset['strt_time']);
      	  		$end_time=explode(" ",$resultset['end_time']);
      	  		if($end_time[0]==NULL){
      	  			$end_time[1]= 'Till Now';
      	  		}
      	  	if($srt_time[0]==$td){	
      	 echo "<tr><th scope='row'>".$j++."</th><td>".$resultset['task']."</td><td>";
      	  echo $srt_time[1]."</td><td>".$end_time[1]."</td>";
      	  echo "<td><a href='./del.php?id=".$resultset['id']."' class='btn btn-light form-control'>DELETE</a></td> </tr>";}
      }}
      if($i==0){
      	echo "<th colspan='4'>No data in database..!</th>";
      }
      	?> 
  </tbody>
</table>	
	</div>
	</div>	
	<div class="container mt-2 bg-white p-0 rounded">
		<form action="./" method="POST">
			<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Enter Task Name" aria-label="Example text with button addon" aria-describedby="button-addon1 " name='tsk' required>
					<div class="input-group-prepend">
			<input type="submit" class="btn btn-outline-dark rounded" id="button-addon1" value="Start">
				  </div>
			</div>
		
		</form>
	</div>	
	<div class="container-fluid m-0 p-0">
		<p class="bg-dark text-white text-center p-3 m-0">Developed by Gaurav Bhatt.&copy; Gaurav Bhatt, 2019.</p>
	</div>
	<script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js"></script>
	<script src="./bootstrap-4.1.3-dist/js/popper.min.js"></script>
	<script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
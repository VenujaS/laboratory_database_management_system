<?php
// include database connection file
require_once'connection_index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Laboratory Database Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3 style="color:Orange;"><b><FONT size='90px'>Laboratory Database Management System</font></b></h3> <hr />
<?php
echo "<img src='electronic-lab2 (6).JPG' >"
?>  
<hr /><h4> <b>Login as Admin :</b></h4>
<a href="login.php"><button class="btn btn-warning"> Login</button></a> <hr />
<h3> <b><u>Instruments Details</u></b></h3> 
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
<thead>
 <th>No.</th>
<th>Instrument No.</th>
<th>Instrument Name</th>
<th>Quantity</th>
<th>Purchased Date</th>
<th>Price</th>
<th>Description_Make</th>
<th>Lab No.</th>
</thead>
<tbody>
<?php
$sql =mysqli_query($con, "call Instruments()");
$cnt=1;
$row=mysqli_num_rows($sql);
if($row>0){
while ($result=mysqli_fetch_array($sql)) {
?>
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result['Instrument_No_']);?></td>
<td><?php echo htmlentities($result['Instrument_Name']);?></td>
<td><?php echo htmlentities($result['Quantity']);?></td>
<td><?php echo htmlentities($result['Purchased_Date']);?></td>
<td><?php echo htmlentities($result['Price']);?></td>
<td><?php echo htmlentities($result['Description_Make']);?></td>
<td><?php echo htmlentities($result['Lab_No_']);?></td>
</tr>
<?php 
// for serial number increment
$cnt++;
} } else { ?> 
<tr> 
<td colspan="9" style="color:red; font-weight:bold;text-align:center;"> No Record found</td>
</tr>
<?php } ?> 
</tbody>
</table> 
</div>
</div>
</div>
</div>
</body>
</html>
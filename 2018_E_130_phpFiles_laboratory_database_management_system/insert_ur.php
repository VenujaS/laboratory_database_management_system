<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['insert']))
{
// Posted Values  
$sid=$_POST['sid'];
$dt=$_POST['dt'];
$iid=$_POST['iid'];
$rdt=$_POST['rdt'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call insertUR('$sid','$dt','$iid','$rdt')");
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='ur.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='ur.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Records</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>User Records</h3><hr />
<a href="ur.php"><button class="btn btn-warning">Back</button></a>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Student ID</b>
<input type="text" name="sid" class="form-control" required>
</div>
<div class="col-md-4"><b>Date and Time</b>
<input type="text" name="dt" class="form-control" required>
</div>
<div class="col-md-4"><b>Instrument ID</b>
<input type="text" name="iid" class="form-control" required>
</div>
<div class="col-md-4"><b>Returned Date and Time</b>
<input type="text" name="rdt" class="form-control" required>
</div>
</div>  

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</div> 
</form>
     
</div>
</div>
</body>
</html>
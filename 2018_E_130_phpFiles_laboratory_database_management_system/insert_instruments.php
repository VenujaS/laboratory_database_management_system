<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['insert']))
{
// Posted Values  
$i_no=$_POST['no'];
$i_na=$_POST['na'];
$i_q=$_POST['q'];
$i_d=$_POST['d'];
$i_p=$_POST['p'];
$i_m=$_POST['m'];
$i_ln=$_POST['ln'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call insert_instruments('$i_no','$i_na','$i_q','$i_d','$i_p','$i_m','$i_ln')");
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='instruments.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='instruments.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Instruments Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Instruments Details</h3><hr />
<a href="instruments.php"><button class="btn btn-warning">Back</button></a>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Instrument No.</b>
<input type="text" name="no" class="form-control" required>
</div>
<div class="col-md-4"><b>Instrument Name</b>
<input type="text" name="na" class="form-control" required>
</div>
<div class="col-md-4"><b>Quantity</b>
<input type="text" name="q" class="form-control" required>
</div>
<div class="col-md-4"><b>Purchased Date</b>
<input type="text" name="d" class="form-control" required>
</div>
<div class="col-md-4"><b>Price</b>
<input type="text" name="p" class="form-control" required>
</div>
<div class="col-md-4"><b>Description_Make</b>
<input type="text" name="m" class="form-control" required>
</div>
<div class="col-md-4"><b>Lab No.</b>
<input type="text" name="ln" class="form-control" required>
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
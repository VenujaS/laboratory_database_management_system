<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['insert']))
{
// Posted Values  
$s_id=$_POST['id'];
$s_na=$_POST['na'];
$s_l=$_POST['l'];
$s_no=$_POST['no'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call insert_staffs('$s_id','$s_na','$s_l','$s_no')");
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='staffs.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='staffs.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Staffs Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Staffs Details</h3><hr />
<a href="staffs.php"><button class="btn btn-warning">Back</button></a>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Staff ID</b>
<input type="text" name="id" class="form-control" required>
</div>
<div class="col-md-4"><b>Name</b>
<input type="text" name="na" class="form-control" required>
</div>
<div class="col-md-4"><b>LogInID</b>
<input type="text" name="l" class="form-control" required>
</div>
<div class="col-md-4"><b>Lab No.</b>
<input type="text" name="no" class="form-control" required>
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
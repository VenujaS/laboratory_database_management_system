<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['login']))
{
// Posted Values  
$s_l_id=$_POST['slid'];
$pass=$_POST['p'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call login('$s_l_id','$pass')");
$row=mysqli_num_rows($sql);
if($row==1)
{
// Message for successfull insertion
echo "<script>alert('login successfull');</script>";
echo "<script>window.location.href='admin.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('log in unsuccesfull');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laboratory Database Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3 style="color:Orange;"><b><FONT size='90px'>Laboratory Database Management System LOGIN </font></h3>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Staff Login ID</b>
<input type="text" name="slid" class="form-control" required>
</div>
</div> 
<div class="row">
<div class="col-md-4"><b>Password</b>
<input type="text" name="p" class="form-control" required>
</div> 
</div> 

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="login" value="Submit">
</div>
</div> 
</form>
     
</div>
</div>
</body>
</html>
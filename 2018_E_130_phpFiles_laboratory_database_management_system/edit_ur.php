<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['update']))
{
// Get the row id
$sid=$_GET['sid'];
$iid=$_GET['iid'];
$dt=$_GET['dt'];
// Posted Values  
$s=$_POST['s'];

// Store  Procedure for Updation
$sql=mysqli_query($con,"call edit_ur('$sid','$iid','$dt','$s')");
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='ur.php'</script>"; 
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
<h3>Edit User Records</h3>
<hr />
</div>
</div>

<?php 
// Get the id
$rsid=isset($_GET['rsid']);
$riid=isset($_GET['riid']);
$rdt=isset($_GET['rdt']);
$sql =mysqli_query($con, "call Row_ur('$rsid','$riid','$rdt')");
while ($result=mysqli_fetch_array($sql)) {                 
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Status</b>
<input type="text" name="s" value="<?php echo htmlentities($result['Status']);?>" class="form-control" required>
</div>
</div> 
</div>   
<?php } ?> 


<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div> 
</form>
</div>
</div>

</body>
</html>
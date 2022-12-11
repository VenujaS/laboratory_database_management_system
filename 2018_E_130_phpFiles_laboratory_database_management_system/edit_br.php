<?php
// include database connection file
require_once'connection_index.php';
if(isset($_POST['update']))
{
// Get the row id
$id=$_GET['id'];
// Posted Values  
$s=$_POST['s'];

// Store  Procedure for Updation
$sql=mysqli_query($con,"call edit_br('$id','$s')");
$sql=mysqli_query($con,"call updateIns('$id')");
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='br.php'</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Broken Instruments Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3>Edit Broken Instruments Details</h3>
<hr />
</div>
</div>

<?php 
// Get the id
$id=$_GET['id'];
$sql =mysqli_query($con, "call Row_br('$id')");
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
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
<?php
echo "<img src='electronic-lab1 (5).JPG' >"
?>  
<h3 style="color:Orange;"><b><FONT size='50px'>Laboratory Database Management System</font></h3> <hr />
<a href="instruments.php"><button class="btn btn-warning"> Instruments Details</button></a>
<a href="lab.php"><button class="btn btn-warning"> Laboratories</button></a>
<a href="staffs.php"><button class="btn btn-warning"> Staffs Details</button></a>
<a href="users.php"><button class="btn btn-warning"> Students Details</button></a>
<a href="ur.php"><button class="btn btn-warning"> Users Records</button></a>
<a href="br.php"><button class="btn btn-warning"> Broken Details</button></a>
<a href="index.php"><button class="btn btn-warning"> Log out</button></a>
</div>
</div>
</div>
</div>
</body>
</html>
<?php 

session_start();

if (isset($_SESSION['worker_id']) && isset($_SESSION['id'])) {

 ?>
<!DOCTYPE html>
<html lang="en"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>משמר בתי המשפט-עכו</title>
  <center><img  src="mishpat.png" class="border-0"> 
   <h1>Hello, <?php echo $_SESSION['f_name']; ?></h1>
        <a href="logout.php">Logout</a>
<link rel="stylesheet" href="css/css.css" type="text/css"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body >
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="hourReport.php">דו"ח שעות חודשי</a>
	<a class="navbar-brand" href="insert.php">אישורי מחלה</a>
	<a class="navbar-brand" href="vaction.php">בקשה לחופשה</a>
	<a class="navbar-brand" href="req.php">בקשות לסידור עבודה</a>
	<a class="navbar-brand" href="home.php">סידור עבודה</a>
	
	
  </div>
</nav>
  <style>
a {
    text-decoration: none;
}
.login-page {
    width: 100%;
    height: 100vh;
    display: inline-block;
    display: flex;
}
.form i {
    font-size: 100px;
}
  </style>
 
<div class="text-center">
<body>
	<form method="post" >
		בקשה 1<br>
		<input type="text" name="txt1" dir="rtl">
		<br>
		תאריך<br>
		<input type="text" name="date1" dir="rtl">
		<br>

		<br>
		<br><br>
		<input class="btn btn-primary" type="submit" name="save" value="שלח">
    <?php
        include 'dbConnection.php';

        if (isset($_POST['save'])) {
		      $workerid=$_SESSION['worker_id'];
          $txt1=$_POST['txt1'];
          $date1=$_POST['date1'];


          $sql="INSERT INTO request(date,text,worker_id) values('$date1','$txt1','$workerid')";
          $query=mysqli_query($conn,$sql);



        }



         ?>
	</form>
    




</body>

</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
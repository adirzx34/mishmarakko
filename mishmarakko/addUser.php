<?php 

session_start();

if (isset($_SESSION['worker_id']) && isset($_SESSION['id'])) {

 ?>
 <?php
include_once 'dbConnection.php';
$result = mysqli_query($conn,"SELECT * FROM users");
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
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top ">
  <div class="container-fluid ">
        <a class="nav-link dropdown-toggle navbar-brand ms-auto" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            דוחות
        </a>
    <ul class="dropdown-menu navbar-brand ms-auto" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="quarter.php"> מצבת עובדים לפי שנים</a></li>
        <li><a class="dropdown-item" href="reportsick.php"> מחלה מאבטחים </a></li>

    </ul>
	<a class="navbar-brand ms-auto " href="downlaod.php">אישורי מחלה מאבטחים</a>
	<a class="navbar-brand ms-auto " href="vactionTable.php">בקשות לחופשה מאבטחים</a>
	<a class="navbar-brand ms-auto " href="mange.php">ניהול משתמשים</a>
	<a class="navbar-brand ms-auto " href="admin-sidur.php">סידור עבודה</a>
	
	
  </div></nav>
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

<body>
	<form method="post" action="add-user.php">
		תעודת זהות<br>
		<input type="text" name="id" dir="rtl">
		<br>
		סיסמא<br>
		<input type="text" name="password" dir="rtl">
		<br>
		שם פרטי:<br>
		<input type="text" name="f_name" dir="rtl">
    <br>
    שם משפחה:<br>
		<input type="text" name="l_name" dir="rtl">
		<br>
		מנהל: for yes press "1" for no press "0"<br>
		<input type="text" name="admin" dir="rtl">
		<br><br>
		<input class="btn btn-primary" type="submit" name="save" value="submit">
	</form>
  

</body>

</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
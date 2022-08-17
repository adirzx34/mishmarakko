<?php 

session_start();

if (isset($_SESSION['worker_id']) && isset($_SESSION['id'])) {

 ?>
 <?php
include_once 'dbConnection.php';
$result = mysqli_query($conn,"SELECT * FROM vaction");
?>
<!DOCTYPE html>
<html lang="en"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>משמר בתי המשפט-עכו</title>  <?php echo $_SESSION['f_name']; ?>,שלום
        <a href="logout.php">Logout</a>
  <center><img  src="mishpat.png" class="border-0"> 
  
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

<table>
	<tr>
	<td>מספר חופשה</td>
	<td>תאריך התחלה</td>
	<td>תאריך סיום</td>
    <td>מספר עובד</td>
    <td>סיבה</td>
    <td>סטטוס</td>
	<td>אישור</td>
    <td>דחיה</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["vac_num"]; ?></td>
	<td><?php echo $row["start_date"]; ?></td>
	<td><?php echo $row["end_date"]; ?></td>
    <td><?php echo $row["worker_id"]; ?></td>
    <td><?php echo $row["text"]; ?></td>
    <td><?php echo $row["statuss"]; ?></td>
	<td><a href="confirmVaction.php?userid=<?php echo $row["vac_num"]; ?>">מאושר</a></td>
    <td><a href="declineVaction.php?userid=<?php echo $row["vac_num"]; ?>">נדחה</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>

</body>

</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
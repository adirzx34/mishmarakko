<?php 

session_start();

if (isset($_SESSION['worker_id']) && isset($_SESSION['id'])) {

 ?>
<!DOCTYPE html>
<html lang="en"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>משמר בתי המשפט-עכו</title>
<center><img src="mishpat.png" > 
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
<div class="container">
        <table class="table table-bordered text-center">
            <thread>
                <tr>
                    <th >הורדה</th>
                    <th>שם הקובץ</th>
                    <th>תאריך סיום</th>
                    <th>תאריך התחלה</th>
                    <th>מספר ימי מחלה</th>
                    <th>מספר מזהה</th>
                </tr>
            </thread>
            <tbody>
                <?php
                include "config.php";
                $stmt = $db->prepare("select * from pdf");
                $stmt->execute();
                while($row=$stmt->fetch()){
                ?>
                <tr>
                <td class-"text-center"><a href="pdf/<?php echo $row['file']?>" class="btn btn-primary"> הורד</a></td>
                <td><?php echo $row['file']  ?></td>
                <td><?php echo $row['end_date']  ?></td>
                <td><?php echo $row['start_date']  ?></td>
                <td><?php echo $row['num_days']  ?></td>
                <td><?php echo $row['id']  ?></td>
     
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>



</body>

</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
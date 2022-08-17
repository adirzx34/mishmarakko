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
<div class="container py-5" id="page-container" dir="rtl">
    <form method="post" autocomplete="off">
	<center>
		<h1>דוח מחלות מאבטחים לפי חודש</h1>
        <br>
        <h1></h1>
		<table >
			<tr>
				<td>
					בחר חודש:
				</td>
				<td>
					<input type="text" id="txtFrom" name="Fromdate" />
				</td>
                <td>
                <input class="btn btn-primary" type="submit" id="search" name="Search"/>
				</td>
			</tr>
			
		
		<?php
			$hostname="localhost";
			$dbname="final_pro";
			$username="root";
			$password="";
			
			$conn=mysqli_connect("$hostname","$username","","$dbname");
			if(isset($_POST["Search"]))
			{
				$selecttxt= $_POST["Fromdate"];
				$query=mysqli_query($conn,"select users.f_name,users.l_name,pdf.start_date,pdf.end_date,pdf.num_days 
                from pdf inner join users  on pdf.user_id=users.id 
                where MONTH(pdf.start_date)='$selecttxt'
                order by pdf.start_date");
				$count=mysqli_num_rows($query);
				if($count==0)
				{
					echo "<h2> אין מחלות בחודש זה</h2>";
				}
				else {
		?>
				<table class="table table-bordered text-center">
				<tr>
                <th> שם פרטי</th>  
				<th> שם משפחה </th>
				<th> מתאריך </th>
                <th> עד תאריך</th>
                <th> כמות ימי מחלה</th>
				</tr>
				<?php 
				while ($row = mysqli_fetch_array($query))
				{
					echo "<tr><td> {$row["f_name"]} </td> <td> {$row["l_name"]} </td> <td> {$row["start_date"]} </td><td> {$row["end_date"]} </td>
                    <td> {$row["num_days"]} </td></tr>\n";
				}
			}
		}
		?>
	</table>
</center>
</form>
    </div>

</body>

</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
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
<div class="container py-5" id="page-container" dir="rtl">
    <form method="post" autocomplete="off">
	<center>
		<h1>דוח שעות מאבטחים לפי חודש</h1>
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
                $id=$_SESSION['id'];
				$query=mysqli_query($conn,"select schedule_list.title,schedule_list.description,schedule_list.start_datetime 
                from schedule_list  inner join users  on schedule_list.worker_id=users.id
                where schedule_list.worker_id='$id' and MONTH(schedule_list.start_datetime)='$selecttxt'");
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
				<th> משמרת </th>
				<th> תאריך </th>
                <th> מספר שעות</th>
				</tr>
				<?php 
				while ($row = mysqli_fetch_array($query))
				{
					echo "<tr><td> {$row["title"]} </td> <td> {$row["description"]} </td> <td> {$row["start_datetime"]} </td><td> 8 </td>
                    </tr>\n";
				}
              
			}$total=$count*8;
                echo " סהכ שעות: $total";
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
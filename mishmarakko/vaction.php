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


	
    <div class="container">
      
         
              <h3 class="mb-3">בקשה לחופשה</h3>
                <div class="bg-white shadow rounded" style="margin: auto;max-width: 400px;">
                 
                        
                            
                                <form  action="vaction.php" class="row g-4" style="margin: auto;max-width: 400px;" method="post">
                                        <div class="col-12">
                                            <label class="float-end">תאריך התחלה</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="date" class="form-control" name="sdate" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="float-end">תאריך סיום</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="date" class="form-control" name="edate">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="float-end">סיבה</label>
                                            <div class="input-group">
                                           <textarea class="form-control " dir="rtl" name="textt" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>

                                        


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary   form-control" name="submit">שלח</button>
                                        </div>
											    <?php
												include 'dbConnection.php';

												if (isset($_POST['submit'])) {
												$start_date=date('Y-m-d', strtotime($_POST['sdate']));
												$end_date=date('Y-m-d', strtotime($_POST['edate']));
												$txt=$_POST['textt'];
												$workerid=$_SESSION['id'];

												$sql="INSERT INTO vaction(start_date,end_date,worker_id,text) values('$start_date','$end_date','$workerid','$txt')";
												$query=mysqli_query($conn,$sql);


												}



												?>
                                </form>
                            
                        
                    
                            
                   
                </div>
           
        
    </div>
    <div class="container py-5" id="page-container" dir="rtl">
    <form method="post" autocomplete="off">
	<center>
		<h1>סטטוס חופשות </h1>
        <br>
        <h1></h1>
		<table border="1">
			<tr>
				<td>
					הכנס מספר תעודת זהות
				</td>
				<td>
					<input type="text" id="txtFrom" name="Fromdate" placeholder="123456789"/>
				</td>
			</tr>
			<input class="btn btn-primary" type="submit" id="search" name="Search"/>
		</table>
		<?php
			$hostname="localhost";
			$dbname="final_pro";
			$username="root";
			$password="";
			
			$conn=mysqli_connect("$hostname","$username","","$dbname");
			if(isset($_POST["Search"]))
			{
				$selecttxt= $_POST["Fromdate"];
				$query=mysqli_query($conn,"select * from vaction where worker_id='$selecttxt'");
				$count=mysqli_num_rows($query);
				if($count==0)
				{
					echo "<h2>  </h2>";
				}
				else {
		?>
				<table class="table table-bordered text-center">
				<tr>
        <th> מספר בקשה </th>  
				<th> תאריך התחלה </th>
				<th> תאריך סיום </th>
        <th> תעודת זהות </th>
        <th> טקסט </th>
        <th> סטטוס </th>
				</tr>
				<?php 
				while ($row = mysqli_fetch_array($query))
				{
					echo "<tr><td> {$row["vac_num"]} </td> <td> {$row["start_date"]} </td> <td> {$row["end_date"]} </td><td> {$row["worker_id"]} </td><td> {$row["text"]} </td><td> {$row["statuss"]} </td></tr>\n";
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
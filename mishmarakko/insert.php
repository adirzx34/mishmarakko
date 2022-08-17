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
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="hourReport.php">דו"ח שעות חודשי</a>
	<a class="navbar-brand" href="insert.php">אישורי מחלה</a>
	<a class="navbar-brand" href="vaction.php">בקשה לחופשה</a>
	<a class="navbar-brand" href="req.php">בקשות לסידור עבודה</a>
	<a class="navbar-brand" href="home.php">סידור עבודה</a>
	
	
  </div>
</nav>
  <div class="text-center">
    <form style="margin: auto;max-width: 400px;" action="insert.php" method="post" enctype="multipart/form-data">
      <label class="form-label sr-only float-end mt-4" for="customFile">אישור מחלה</label>
	  <input type="file" class="form-control  mt-4 " name="pdf" id="pdf" dir="rtl" placeholder="בחר קובץ"  />
      <div class="div mt-4">
      <label class="form-label sr-only float-end mt-4" for="customFile">מספר ימי מחלה</label>
      <input type="text" class="form-control" dir="rtl" name="numdays">
      </div>
      <div class="div mt-4">
      <label class="form-label sr-only float-end mt-4" for="customFile">תאריך התחלה</label>
      <input type="text" class="form-control" dir="rtl" name="start_date" placeholder="YYYY-MM-DD">
      </div>
      <div class="div mt-4">
      <label class="form-label sr-only float-end mt-4" for="customFile">תאריך סיום</label>
      <input type="text" class="form-control" dir="rtl" name="end_date" placeholder="YYYY-MM-DD">
        <button class="btn btn-lg btn-primary  mt-5 btn-block" id="upload" type="submit" name="submit" value="Upload">שמור</button>
      </div>
	    <?php
        include 'dbConnection.php';

        if (isset($_POST['submit'])) {
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
		      $workerid=$_SESSION['worker_id'];
          $num=$_POST['numdays'];
          $sdate=$_POST['start_date'];
          $edate=$_POST['end_date'];
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO pdf(file,user_id,num_days,start_date,end_date) values('$pdf','$workerid',$num,'$sdate','$edate')";
          $query=mysqli_query($conn,$sql);



        }



         ?>
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
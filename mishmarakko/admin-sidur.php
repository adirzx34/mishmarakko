<?php 

session_start();

if (isset($_SESSION['worker_id']) && isset($_SESSION['id'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>משמר בתי המשפט-עכו</title>
 

     <a href="logout.php" text-alighn="left">Logout</a><center><img src="mishpat.png" ></center>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
        .title{
            font-size: 30px;
        }
    </style>
</head>
<body class="bg-white">

    <?php
        require_once('dbConnection.php');

        $schedules = $conn->query("SELECT * FROM `schedule_list`");
        $sched_res = [];

        foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
            $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
            $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
            $sched_res[$row['id']] = $row;
        }

        if(isset($conn)) $conn->close();
    ?>

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
    <div class="container py-5" id="page-container" dir="rtl">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title" dir="rtl">קביעת משמרת</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label float-end">מאבטח</label>
                                    <input dir="rtl" type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="worker_id" class="control-label float-end">מספר עובד</label>
                                    <input dir="rtl" type="text" class="form-control form-control-sm rounded-0" name="worker_id" id="worker_id" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label float-end">משמרת</label>
                                    <textarea dir="rtl" rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label float-end">זמן התחלה</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label float-end">זמן סיום</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> שמור</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> מחק</button>
                        </div>
                    </div>
                </div>

               
           </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5" id="page-container" dir="rtl">
    <form method="post" autocomplete="off">
	<center>
		<h1>בקשות מאבטחים לפי תאריך </h1>
        <br>
        <h1></h1>
		<table >
			<tr>
				<td>
					בחר תאריך:
				</td>
				<td>
					<input type="text" id="txtFrom" name="Fromdate" placeholder="yyyy-mm-dd"/>
				</td>
                <td>
                    <input class="btn btn-primary" type="submit" id="search" name="Search"/>
                </td>
			</tr>
			
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
				$query=mysqli_query($conn,"select * from request inner join users on request.worker_id=users.worker_id where date='$selecttxt'");
				$count=mysqli_num_rows($query);
				if($count==0)
				{
					echo "<h2> אין בקשות לתאריך זה </h2>";
				}
				else {
		?>
				<table border="1">
				<tr>
                <th> מספר בקשה </th>  
				<th> בקשה </th>
				<th> תאריך </th>
                <th> תעודת זהות </th>
                <th> שם פרטי </th>
                <th> שם משפחה </th>                
				</tr>
				<?php 
				while ($row = mysqli_fetch_array($query))
				{
					echo "<tr><td> {$row["id"]} </td> <td> {$row["text"]} </td> <td> {$row["date"]} </td><td> {$row["worker_id"]} </td><td> {$row["f_name"]} </td> <td> {$row["l_name"]} </td></tr>\n";
				}
			}
		}
		?>
	</table>
</center>
</form>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                   <button type="button" class="btn-close pull-left" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title float-end" dir="rtl">קבע משמרת</h5>
                    
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid float-end" dir="rtl">
                        <dl>
                            <dt class="text-muted">מאבטח</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">מספר עובד</dt>
                            <dd id="worker_id" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">משמרת</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">זמן התחלה</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">זמן סיום</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">סגור</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">מחק</button>
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">ערוך</button>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="script.js"></script>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>

</body>
</html>
<script>  
    
      $(document).ready(function(){  

           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           
           $(function(){  
                $("#from_date").datepicker();  
              
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                 
                if(from_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
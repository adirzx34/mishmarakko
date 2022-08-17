<!DOCTYPE html>
<html lang="en"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>משמר בתי המשפט-עכו</title>

<link rel="stylesheet" href="css/css.css" type="text/css"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body >

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
input[type="text"]::placeholder { 
                  
                text-align: right;
            }
  </style>
  <center><img  src="mishpat.png" class="border-0"> 
<div class="login-page bg-white">
	
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">התחברות</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form h-100 py-5 px-5">
                                <form action="login.php" class="row g-4" method="post">
								        <?php if (isset($_GET['error'])) { ?>

										<p class="error"><?php echo $_GET['error']; ?></p>

										<?php } ?>
                                        <div class="col-12">
                                            <label class="float-end">מספר עובד<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control"  name="uname">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="float-end">סיסמא<span class="text-danger ">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" name="password"  class="form-control float-end">
                                            </div>
                                        </div>

                                        
                                            <div class="checkbox float-end">
                                                <input class="form-check-input  " type="checkbox" >
                                                <label class="form-check-label  " >זכור אותי</label>
                                            </div>
                                        

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary   form-control">התחבר</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <img class="col-md-5 ps-0 d-none d-md-block img-fluid" src="1.jpg" >
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
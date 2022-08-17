<?php
include_once 'dbConnection.php';
if(isset($_POST['save']))
{	 
	 $id = $_POST['id'];
	 $password = $_POST['password'];
	 $f_name = $_POST['f_name'];
	 $l_name = $_POST['l_name'];
	 $admin = $_POST['admin'];
	 $sql = "INSERT INTO users (id,password,l_name,f_name,admin)
	 VALUES ('$id','$password','$l_name','$f_name',$admin)";
	 $sql2= "INSERT INTO workers (id,password,l_name,f_name,admin)
	 VALUES ('$id','$password','$l_name','$f_name',$admin)";
	 if (mysqli_query($conn, $sql) AND mysqli_query($conn, $sql2)) {
		header("Location: mange.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
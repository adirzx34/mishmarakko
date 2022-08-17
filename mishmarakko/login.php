<?php 

session_start(); 

include "dbConnection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{
        header("Location: index.php?error=dada");
        $sql = "SELECT * FROM users WHERE id='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['id'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['id'] = $row['id'];

               $_SESSION['f_name'] = $row['f_name'];

                $_SESSION['worker_id'] = $row['worker_id'];
                if($row['admin']== true){
                header("Location: admin-sidur.php");
                }else{
                header("Location: home.php");

                exit();
                }
            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}?>
<?php
include_once 'dbConnection.php';
$sql = "DELETE FROM users WHERE worker_id='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location: mange.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
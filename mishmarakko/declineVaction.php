<?php
include_once 'dbConnection.php';
$sql = "UPDATE vaction SET statuss = 'נדחה' WHERE vac_num='" . $_GET["userid"] . "'";

if (mysqli_query($conn, $sql)) {
    header("Location: vactionTable.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
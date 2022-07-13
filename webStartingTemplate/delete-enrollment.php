<?php
require_once('logics/dbconnection.php');

$sqlDeleteStudent= mysqli_query($conn, "DELETE FROM enrollment WHERE no='".$_GET['id']."' ");
if($sqlDeleteStudent)
{
    echo "user name deleted";
    header('location:student.php');
}
else
{
    echo "error occured";
}

?>
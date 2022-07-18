<?php

$server= "localhost";
$username="root";
$password="";
$database="zalego";

$conn= mysqli_connect($server, $username,$password,$database);
$sqlDeleteStudent= mysqli_query($conn, "DELETE FROM contactus WHERE number='".$_GET['id']."' ");
if($sqlDeleteStudent)
{
    echo "user name deleted";
    header('location:contactus.php');
}
else
{
    echo "error occured";
}

?>
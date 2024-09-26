<?php

session_start();
include "connectdb.php";
$cid = $_SESSION['cpid'];

    
$img = "$cid.jpg";
COPY($_FILES['img']['tmp_name'],"./c_img/".$img);
$sqli = "UPDATE company set cp_picture='$img' where cp_id='$cid'";
mysqli_query($con,$sqli);

echo "<meta http-equiv='refresh' content='0;URL=editproc.php'>";

?>
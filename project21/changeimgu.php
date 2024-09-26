<?php

session_start();
include "connectdb.php";
$uid = $_SESSION['uid'];

    
$img = "$uid.jpg";
COPY($_FILES['img']['tmp_name'],"./u_img/".$img);
$sqli = "UPDATE user set u_img='$img' where u_id='$uid'";
mysqli_query($con,$sqli);

echo "<meta http-equiv='refresh' content='0;URL=editprou.php'>";

?>
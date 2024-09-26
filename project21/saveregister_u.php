<?php
include "connectdb.php";
    $n=$_POST['name'];
    $ad=$_POST['numad'];
    $mu=$_POST['mooad'];
    $tum=$_POST['tumad'];
    $um=$_POST['umad'];
    $pv=$_POST['pvad'];
    $post=$_POST['postad'];
    $address="$ad $mu $tum $um $pv $post";
    $t=$_POST['tel'];
    $ed=$_POST['education'];
    $s=$_POST['sex'];
    $sa=$_POST['sasana'];
    $b=$_POST['birtdate'];
    $e=$_POST['email'];
    $u=$_POST['user'];
    $p=$_POST['password'];      
    echo $address;
    $sql="INSERT INTO user(u_name,u_tel,u_address,u_education,u_sex,u_rg,u_birtdate,u_email,u_username,u_password)
    VALUES('$n','$t','$address','$ed','$s','$sa','$b','$e','$u','$p')";
    //echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    mysqli_query($con,$sql);
    mysqli_close($con);
    ?> 
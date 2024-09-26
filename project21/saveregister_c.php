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
    $e=$_POST['email'];
    $u=$_POST['user'];
    $p=$_POST['password']; 
    $sql="SELECT * from company where cp_user='$u' ";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);
    if($num==0){
    $sql="INSERT INTO company(cp_name,cp_address,cp_phone,cp_email,cp_user,cp_password)VALUES('$n','$address','$t','$e','$u','$p')";
    mysqli_query($con,$sql);
    mysqli_close($con); 
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
} else{
        echo "<script>alert('รหัสบริษัทนี้ถูกใช้งานแล้ว')</script>";
        echo "<meta http-equiv='refresh' content='0;register_c.php'>";                            
    }
    ?> 
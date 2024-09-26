<?php
session_start();
include "../connectdb.php";
$u=$_POST['username'];
$p=$_POST['password'];
// echo $u;
// echo $p;
$sql="SELECT * from admin where a_username='$u' and a_password='$p' ";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$num=mysqli_num_rows($result);

if($num==1)
{
    $_SESSION['aid']=$row['a_id'];
    echo "<meta http-equiv='refresh' content='0;company.php'>";

}else
{
    echo "<script>alert('รหัสผ่านผิดพลาด')</script>";
    echo "<meta http-equiv='refresh' content='0;index.php'>";
}

?>
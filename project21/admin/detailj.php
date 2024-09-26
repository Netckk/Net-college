<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>🏢สำหรับแอดมิน	</title>

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<style type="text/css">
		
		@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap');

		body {
			background: #bdc3c7;
			font-family: 'Kanit', sans-serif;
		}

		.btn-primary {
		    --bs-btn-color: #fff;
		    --bs-btn-bg: #A3CB38;
		    --bs-btn-border-color: #A3CB38;
		    --bs-btn-hover-color: #fff;
		    --bs-btn-hover-bg: #009432;
		    --bs-btn-hover-border-color: #009432;
		    --bs-btn-focus-shadow-rgb: 49,132,253;
		    --bs-btn-active-color: #fff;
		    --bs-btn-active-bg: #009432;
		    --bs-btn-active-border-color: #009432;
		    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
		    --bs-btn-disabled-color: #fff;
		    --bs-btn-disabled-bg: #A3CB38;
		    --bs-btn-disabled-border-color: #A3CB38;
		}

	</style>

</head>
<body>

	<div class="container mt-3">
		<?php
		include "head.php";
		?>
	</div>
     <br>
	 <div class="container">
	 <div class="row">
	 <div class="col-sm-12 col-md-3 col-lg-3 mx-auto">

	 <?php include "menu.php"; ?>
	 
	 </div>
	 <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
     <?php
		include "../connectdb.php";
		$id=$_GET['jid'];
		$sql="SELECT * from job,company,typejob,disability where job_id='$id' and cp_id=job_cpid and job_wb=id_tpjob and job.id_dst=disability.id_dst";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);

// echo $row['cp_picture'];
		?>
            <div class="card">
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-1 col-lg-1">
		<img src="../c_img/<?php echo $row['cp_picture']; ?>" alt="" width="80px;">
                     

                        </div>
                        <div class="col-sm-12 col-md-11 col-lg-11">
                <h4 class="card-title">
                &nbsp; ข้อมูลบริษัท
                        </h4>

                        </div>
                    </div>
                    <!-- <p class="card-text"></p> -->
		

	

<hr>
		<?php
		echo "ชื่องาน : ".$row['job_name']."<br>";
		echo "รายละเอียด : ".$row['job_detail']."<br>";
		echo "สวัสดิการ : ".$row['job_welfare']."<br>";
		echo "เงินเดือน : ".$row['job_salary']."<br>";



		?>

<hr>

<h4>รายชื่อคนสมัครงาน</h4>
<?php
$sqlu="SELECT * from regisjob,user where r_uid=u_id and r_jid='$id'";
$resultu=mysqli_query($con,$sqlu);
$numu=mysqli_num_rows($resultu);

if($numu==0)
{
    ?>
<div class="alert alert-danger">
    <h5>ไม่มีรายชื่อคนสมัครงาน</h5>
</div>
    <?php
}else{
?>
<table class="table">
    <tr>
        <td>ชื่อ</td>
        <td>เบอร์โทร</td>
        <td>ที่อยู่</td>
        <td>สถานะ</td>
    </tr>
 <?php
 while($rowu=mysqli_fetch_assoc($resultu))
 {
    ?>
    <tr>
        <td><?php echo $rowu['u_name']; ?></td>
        <td><?php echo $rowu['u_tel']; ?></td>
        <td><?php echo $rowu['u_address']; ?></td>
        <td>
            <?php
            if($rowu['r_status']==1)
            {
                echo "ผ่าน";
            }elseif($rowu['r_status']==2)
            {
                echo "ไม่ผ่าน";
            }else
            {
                echo "รอการยืนยัน";
            }
            ?>
        </td>

    </tr>
    <?php
 }
 ?>
</table>
<?php } ?>
                </div>
		
            </div>

	 </div>
    
    
    </div>
	 </div>

	

		</div>
	</div>

	<footer class="footer mt-5">
    <div class="card text-center text-muted" style="background: none; border: none;">
			<div class="card-body">
				<h6>
					chakkrit Ruerang
				</h6>
			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>





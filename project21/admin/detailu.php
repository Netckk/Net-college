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

            <div class="card">
               
                <div class="card-body">
                    <h4 class="card-title">ข้อมูลผู้หางาน</h4>
                    <!-- <p class="card-text"></p> -->
		<hr>

		<?php
        include "../connectdb.php";
        $id=$_SESSION['uid'];
        $sql="SELECT * from user where u_id='$id' ";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $address = explode(" ",$row['u_address']);
        ?>
</div>
	

    <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
        
<div class="card">
    
    <div class="card-body">

    <form action="updateu.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="" class="form-label">ชื่อ - สกุล</label>
      <input type="text" name="name" id="" value="<?php echo $row['u_name']; ?>" class="form-control" placeholder="ชื่อ - สกุล" aria-describedby="helpId" required>

    </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">

            <div class="mb-3">
     
     <label for="" class="form-label">บ้านเลขที่</label>
     <input type="text" name="numad" value="<?php echo $address[0]; ?>"  class="form-control" placeholder="บ้านเลขที่" required>
 
     </div>
 
     <div class="mb-3">
      
      <label for="" class="form-label">หมู่ที่</label>
      <input type="text" name="mooad" value="<?php echo $address[1]; ?>"  class="form-control" placeholder="หมู่ที่" required>
  
      </div>
           
      
     <div class="mb-3">
      
      <label for="" class="form-label">ตำบล</label>
      <input type="text" name="tumad" value="<?php echo $address[2]; ?>"  class="form-control" placeholder="ตำบล" required>
  
      </div>
           
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                
     <div class="mb-3">
     
     <label for="" class="form-label">อำเภอ</label>
     <input type="text" name="umad" value="<?php echo $address[3]; ?>"  class="form-control" placeholder="อำเภอ" required>
 
     </div>
          
     
     <div class="mb-3">
     
     <label for="" class="form-label">จังหวัด</label>
     <input type="text" name="pvad" value="<?php echo $address[4]; ?>"  class="form-control" placeholder="จังหวัด" required>

     </div>
          
     <div class="mb-3">
     
     <label for="" class="form-label">รหัสไปรษณีย์</label>
     <input type="text" name="postad" value="<?php echo $address[5]; ?>"  class="form-control" placeholder="รหัสไปรษณีย์" required>


     </div>            

            </div>
        </div>

        <!-- <div class="mb-3">
      
      <label for="" class="form-label">รูปประจำตัว</label>
      <input type="file" name="img"  class="form-control" placeholder="รูปภาพ" >
  
      </div>                -->
              

        <div class="mb-3">
                    <label>ลักษณะความพิการ</label>
                    <select name="dst" class="form-control">
                        <?php
                        $sqld="SELECT * from disability";
                        $resultd=mysqli_query($con,$sqld);
                        $n=1;
                        
                        while($rowd=mysqli_fetch_assoc($resultd)){
                        ?>
                        <option 
                        <?php
                        if($row['id_dst']==$rowd['id_dst'])
                        {
                            echo "selected";
                        }
                        ?>
                        value="<?php echo $rowd['id_dst']; ?>"><?php echo $n++.".".$rowd['name_dst']; ?></option>
                        <?php } ?>
                    </select>
                </div>
              

           
              
              
              
              
     <div class="mb-3">
      
      <label for="" class="form-label">วันเกิด</label>

<input type="date" name="birth" value="<?php echo $row['u_birtdate']; ?>" id="" class="form-control" placeholder="วัน/เดือน/ปี">

        
        </select>
 
      </div>
     <div class="mb-3">
      
      <label for="" class="form-label">เพศ</label>

      <select name="sex" id="" class="form-control">
        <option value="ชาย" <?php
        if($row['u_sex']=="ชาย")
        {
            echo "selected";
        }
        ?>>ชาย</option>
        <option value="หญิง"
        <?php
        if($row['u_sex']=="หญิง")
        {
            echo "selected";
        }
        ?>>หญิง</option>
        <option 
        <?php
        if($row['u_sex']=="ไม่ระบุ")
        {
            echo "selected";
        }
        ?>
        value="ไม่ระบุ">ไม่ระบุ</option>

        
        </select>
 
      </div>
           
              
     <div class="mb-3">
      
      <label for="" class="form-label">การศึกษา </label>

      <select name="edu" id="" class="form-control">
        <option <?php
        if($row['u_education']=="มัธยมต้น")
        {
            echo "selected";
        }
        ?> value="มัธยมต้น">มัธยมต้น</option>


        <option  <?php
        if($row['u_education']=="มัธยมปลาย")
        {
            echo "selected";
        }
        ?>  value="มัธยมปลาย">มัธยมปลาย</option>


        <option <?php
        if($row['u_education'] == "ประกาศนียบัตรวิชาชีพชั้นต้น")
        {
            echo "selected";
        }
        ?>  value="ประกาศนียบัตรวิชาชีพชั้นต้น">ประกาศนียบัตรวิชาชีพชั้นต้น</option>
        <option <?php
        if($row['u_education'] == "ประกาศนียบัตรวิชาชีพชั้นสูง")
        {
            echo "selected";
        }
        ?>  value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
        <option <?php
        if($row['u_education'] == "ปริญญาตรี")
        {
            echo "selected";
        }
        ?>  value="ปริญญาตรี">ปริญญาตรี</option>
        <option <?php
        if($row['u_education'] == "ปริญญาโท")
        {
            echo "selected";
        }
        ?>  value="ปริญญาโท">ปริญญาโท</option>
        <option <?php
        if($row['u_education'] == "ปริญญาเอก")
        {
            echo "selected";
        }
        ?>  value="ปริญญาเอก">ปริญญาเอก</option>
        
        </select>
      </div>
           
              
     <div class="mb-3">
      
      <label for="" class="form-label">ศาสนา</label>
      <select name="rg" id="" class="form-control">
        <option <?php
        if($row['u_rg']=="พุทธ")
        {
            echo "selected";
        }
        ?> value="พุทธ">พุทธ</option>
        <option  <?php
        if($row['u_rg']=="อิสลาม")
        {
            echo "selected";
        }
        ?>  value="อิสลาม">อิสลาม</option>
        <option  <?php
        if($row['u_rg']=="พราหมณ์-ฮินดู")
        {
            echo "selected";
        }
        ?>  value="พราหมณ์-ฮินดู">พราหมณ์-ฮินดู</option>
        <option  <?php
        if($row['u_rg']=="คริส")
        {
            echo "selected";
        }
        ?>  value="คริส">คริส</option>
        <option  <?php
        if($row['u_rg']=="ไม่นับถือศาสนา")
        {
            echo "selected";
        }
        ?>  value="ไม่นับถือศาสนา">ไม่นับถือศาสนา</option>
    
        
        </select>
  
      </div>
           
     <div class="mb-3">
      
      <label for="" class="form-label">เบอร์โทรติดต่อ</label>
      <input type="text" name="tel" value="<?php echo $row['u_tel']; ?>"  class="form-control" placeholder="เบอร์โทร" required>
  
      </div>
           
     <div class="mb-3">
      
      <label for="" class="form-label">อีเมล์</label>
      <input type="email" name="email" value="<?php echo $row['u_email']; ?>"  class="form-control" placeholder="อีเมล์" required>
  
      </div>
           
     <div class="mb-3">
      
      <label for="" class="form-label">ชื่อผู้ใช้</label>
      <input type="text" name="user" value="<?php echo $row['u_username']; ?>" class="form-control" placeholder="ชื่อผู้ใช้" required>
  
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





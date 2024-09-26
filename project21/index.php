<?php
session_start();
include "connectdb.php";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลัก</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Kanit', sans-serif;
        }
        .card {
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f1f1f1;
            padding: 10px 0;
        }
        .btn-primary {
            background-color: #A3CB38;
            border-color: #A3CB38;
        }
        .btn-primary:hover {
            background-color: #009432;
            border-color: #009432;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <?php
    unset($_SESSION['hack']);
    $_SESSION['index'] = 1;
    include "head.php"; // แสดง Navbar
    ?>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <form action="index.php" method="post">
                    <div class="card-body">
                        <h5 class="card-title">ค้นหางาน</h5>
                        <div class="form-group mb-3">
                            <label>แผนกวิชา</label>
                            <select name="dst" class="form-control">
                                <option value="">ไม่ระบุ</option>
                                <?php
                                $sql = "SELECT * FROM disability";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id_dst'] . '">' . $row['name_dst'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="ค้นหา" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <?php  
                    if (empty($_POST['dst'])) {
                        $sql = "SELECT * FROM job INNER JOIN company ON job_cpid = cp_id";
                    } else {
                        //$type = $_POST['type'] ?: '';
                        $dst = $_POST['dst'] ?: '';
                        $sql = "SELECT * FROM job INNER JOIN company ON job_cpid = cp_id WHERE id_dst LIKE '%$dst%'";
                    }
                    
                    $result = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($result);
                    ?>
                    <h5 class="card-title">ค้นหาพบ <?php echo $num; ?> งาน</h5>
                    <div class="row">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img src="c_img/<?php echo $row['cp_picture']; ?>" class="card-img-top" alt="<?php echo $row['job_name']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['job_name']; ?></h5>
                                        <p class="card-text">
                                            <strong>ชื่อบริษัท:</strong> <?php echo $row['cp_name']; ?><br>
                                            <!--<strong>เงินเดือน:</strong> <?php echo $row['job_salary']; ?><br>-->
                                            <strong>แผนกวิชา:</strong> 
                                            <?php
                                            $idst = $row['id_dst'];
                                            $sqld = "SELECT * FROM disability WHERE id_dst='$idst'";
                                            $resultd = mysqli_query($con, $sqld);
                                            $rowd = mysqli_fetch_assoc($resultd);
                                            echo $rowd['name_dst'];
                                            ?>
                                        </p>
                                        <a href="detailjob.php?jid=<?php echo $row['job_id']; ?>" class="btn btn-primary">รายละเอียด</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-5">
    <div class="text-center text-muted">
        <p>© <?php echo date("Y"); ?> จักรกฤษ ฦาแรง  &&  ณัฐนันท์ แก้วจันทร์</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

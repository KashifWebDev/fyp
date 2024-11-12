<?php require '../parts/app.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../img/logo.png" />
    <title>ABC International - South Africa | Global Student Verification List</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/custom.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css">
    <link href="../css/sb-admin-2.min.css?v=<?php echo rand(); ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top bg-dark" style="background-color: #202A5B !important;">
    <a class="navbar-brand" href="#">
        <img src="../img/logo.png" alt="" style="height: 40px;">
    </a>
<!--    <ul class="navbar-nav">-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#">Link</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#">Link</a>-->
<!--        </li>-->
<!--    </ul>-->
</nav>


<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registered Students Record</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name of Student</th>
                        <th>Flag</th>
                        <th>Country</th>
                        <th>Registration Date</th>
                        <th>Invoice #</th>
                        <th>Passport #</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name of Student</th>
                        <th>Flag</th>
                        <th>Country</th>
                        <th>Registration Date</th>
                        <th>Invoice #</th>
                        <th>Passport #</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM master_registration_list";
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res)){
                        while($row = mysqli_fetch_array($res)){
                            $cntry_flag = null;
                            $cntry = $row["country"];
                            if($cntry == "Democratic Republic of Congo") $cntry_flag = '<img style="height: 35px;" src="../img/flag_drc.png">';
                            if($cntry == "Republic of Congo") $cntry_flag = '<img style="height: 35px;" src="../img/flag_rcf.png">';
                            if($cntry == "Libya") $cntry_flag = '<img style="height: 35px; width: 48px;" src="../img/flag_libya.png">';
                            $s1 = "SELECT * FROM countries WHERE country_name='$cntry'";
                            $se = mysqli_query($con, $s1);
                            if(mysqli_num_rows($se)){
                                $cn = mysqli_fetch_array($se);
                                $f = $cn["country_code"];
                                $cntry_flag = '<img src="https://www.countryflags.io/'.$f.'/shiny/48.png">';
                                $cntry_flag = '<img style="height: 37px;" src="https://flagicons.lipis.dev/flags/4x3/'.strtolower($f).'.svg">';
                            }else{
//                                                echo $s1;
                            }
                            if(!empty($row["registration_invoice_no"]) ||  $row["registration_invoice_no"]!=null){
                                ?>
                                <tr>
                                    <td><?php echo $row["student_name"]; ?></td>
                                    <td><?php echo isset($cntry_flag) ? $cntry_flag : '--'; ?></td>
                                    <td><?php echo $row["country"]; ?></td>
                                    <td><?php echo $row["registration_date"]; ?></td>
                                    <td><?php echo $row["registration_invoice_no"]; ?></td>
                                    <td><?php echo $row["passport_no"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>
</body>
</html>



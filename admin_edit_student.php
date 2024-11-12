<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Edit Student";
require 'parts/head.php';
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'parts/side_bar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require 'parts/top_bar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

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
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Flag</th>
                                        <th>Passport #</th>
                                        <th>Invoice #</th>
                                        <th>DOB</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Flag</th>
                                        <th>Passport #</th>
                                        <th>Invoice #</th>
                                        <th>DOB</th>
                                        <th>Email</th>
                                        <th>Action</th>
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
                                            if($cntry == "Democratic Republic of Congo") $cntry_flag = '<img style="height: 35px;" src="img/flag_drc.png">';
                                            if($cntry == "Republic of Congo") $cntry_flag = '<img style="height: 35px;" src="img/flag_rcf.png">';
                                            if($cntry == "Libya") $cntry_flag = '<img style="height: 35px; width: 48px;" src="img/flag_libya.png">';
                                            $s1 = "SELECT * FROM countries WHERE country_name='$cntry'";
                                            $se = mysqli_query($con, $s1);
                                            if(mysqli_num_rows($se)){
                                                $cn = mysqli_fetch_array($se);
                                                $f = $cn["country_code"];
                                                $cntry_flag = '<img src="https://www.countryflags.io/'.$f.'/shiny/48.png">';
                                            }else{
//                                                echo $s1;
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $row["student_id"]; ?></td>
                                                <td><?php echo $row["student_name"]; ?></td>
                                                <td><?php echo $row["country"]; ?></td>
                                                <td><?php echo isset($cntry_flag) ? $cntry_flag : '--'; ?></td>
                                                <td><?php echo $row["passport_no"]; ?></td>
                                                <td><?php echo $row["registration_invoice_no"]; ?></td>
                                                <td><?php echo $row["dob"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td>
                                                    <a href="admin_edit_student_page.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <span class="text">Edit</span>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require 'parts/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
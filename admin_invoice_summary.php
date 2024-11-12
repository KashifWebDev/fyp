<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Invoices Summary";
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
                            <h6 class="m-0 font-weight-bold text-primary">Invoices Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Invoice #</th>
                                        <th>Service</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Invoice #</th>
                                        <th>Service</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM master_registration_list";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $name = $row["student_name"];
                                            $paid = false;
                                            $s = "SELECT * FROM payments WHERE Customer='$name' ORDER BY Database_Invoice_No DESC";
//                                            $s = "SELECT * FROM payments where Database_Invoice_No  = 3165";
                                            $r = mysqli_query($con, $s);
                                            if(mysqli_num_rows($r)){
                                                $x = mysqli_fetch_array($r);
                                                $mnth = strtolower(date("M"));
                                                $curMonth = strtolower($x["ProductService_Description"]);
//                                                echo $mnth.' '.$curMonth.'<br>';
//                                                echo 'FLAG: '.strpos($curMonth,$mnth); //exit(); die();
//                                                if (strpos($mystring, $word) !== false){
                                                if (strpos(strtolower($x["ProductService_Description"]),$mnth)!== false || strpos(strtolower($x["mnth"]),$mnth)!== false) {
                                                    $paid = true;
                                                }
//                                                echo $paid; exit(); die();
//                                                print_r($x);
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $row["student_id"]; ?></td>
                                                <td><?php echo $row["student_name"]; ?></td>
                                                <td><?php echo $row["registration_invoice_no"]; ?></td>
                                                <td><?php echo $x["ProductService_Description"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td class="d-block" style="width: max-content;">
                                                    <?php
                                                    echo $paid ?
                                                        '<span class="bg-success text-white px-2 py-1" style="border-radius: 10px;">Paid</span>' :
                                                        '<span class="bg-danger text-white px-2 py-1" style="border-radius: 10px;">Un Paid</span>';
                                                    ?>
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
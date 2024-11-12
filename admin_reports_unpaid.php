<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "UnPaid Report";
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
                    <?php
                    if(isset($_GET["success"]) && $_GET["success"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Course added Successfully!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="row my-2">
                        <div class="col-md-6 mx-auto d-flex justify-content-around">
                            <form class="form-inline" action="" method="get">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="mr-2">Start Date:</label>
                                    <input type="date" class="form-control" name="start" required>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="mr-2">End Date:</label>
                                    <input type="date" class="form-control" name="end" required>
                                </div>
                                <button type="submit" name="add_course" class="btn btn-primary mb-2"> <i class="fas fa-search mr-1"></i> Search Now</button>
                            </form>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <?php
                        if(isset($_GET["start"]) && $_GET["start"]){
                            $start =  $_GET["start"];
                            $end =  $_GET["end"];
                            $month = date('F');
                            $s = "SELECT * FROM master_registration_list";
                            $s1 = mysqli_query($con, $s);
                            $count = 0;
                            while($s2 = mysqli_fetch_array($s1)){
                                $name = $s2["student_name"];
                                $sql = "SELECT * FROM payments WHERE (ProductService_Description NOT LIKE '%$month%' OR mnth!='$month') AND Customer = '$name'
                                    AND (DATE(date_time) BETWEEN '$start' AND '$end')";
//                                echo $sql; exit();
                                $res = mysqli_query($con, $sql);
                                if(mysqli_num_rows($res)==0){
                                    $count++;
                                }
                            }
                            ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center d-flex justify-content-center  mb-4 border-bottom">
                                            <h3 class="filter_heading">Total Records: <?php echo $count; ?></h3>
                                            <h3 class="filter_heading"><?php echo $_GET["start"]; ?> - <?php echo $_GET["end"]; ?></h3>
                                        </div>
                                    </div>
                                </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Search Details</h6>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Terms of Payment</th>
                                        <th>EFT Date</th>
                                        <th>EFT Reference</th>
                                        <th>ABC Receipt</th>
                                        <th>Service Description</th>
                                        <th>Notes</th>
                                        <th>Total</th>
                                        <th>Balance</th>
                                        <th>Services</th>
                                        <th>Course</th>
                                        <th>Teacher</th>
                                        <th>No of Pages</th>
                                        <th>Month</th>
                                        <th>Language</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Terms of Payment</th>
                                        <th>EFT Date</th>
                                        <th>EFT Reference</th>
                                        <th>ABC Receipt</th>
                                        <th>Service Description</th>
                                        <th>Notes</th>
                                        <th>Total</th>
                                        <th>Balance</th>
                                        <th>Services</th>
                                        <th>Course</th>
                                        <th>Teacher</th>
                                        <th>No of Pages</th>
                                        <th>Month</th>
                                        <th>Language</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $s = "SELECT * FROM master_registration_list";
                                    $s1 = mysqli_query($con, $s);
                                    if(mysqli_num_rows($s1)){
                                        while($s2 = mysqli_fetch_array($s1)){
                                            $name = $s2["student_name"];
                                            $sql = "SELECT * FROM payments WHERE (ProductService_Description NOT LIKE '%$month%' OR mnth!='$month') AND Customer = '$name'
                                                        AND (DATE(date_time) BETWEEN '$start' AND '$end')";
                                            $res = mysqli_query($con, $sql);
                                            if(mysqli_num_rows($res)){
                                                $row = mysqli_fetch_array($res);
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["Database_Invoice_No"]; ?></td>
                                                    <td><?php echo $row["Customer"]; ?></td>
                                                    <td><?php echo $row["Invoice_Date"]; ?></td>
                                                    <td><?php echo $row["Terms_of_Payment"]; ?></td>
                                                    <td><?php echo $row["eft_date"]; ?></td>
                                                    <td><?php echo $row["eft_reference"]; ?></td>
                                                    <td><?php echo $row["ABC_Receipt_book"]; ?></td>
                                                    <td><?php echo $row["ProductService_Description"]; ?></td>
                                                    <td><?php echo $row["Notes"]; ?></td>
                                                    <td><?php echo $row["Amount"]; ?></td>
                                                    <td><?php echo $row["Balance"]; ?></td>
                                                    <td><?php echo str_replace("|",", ",$row["userSelection"]); ?></td>
                                                    <td><?php echo $row["Course"]; ?></td>
                                                    <td><?php echo $row["Teacher"]; ?></td>
                                                    <td><?php echo $row["Tranlations_no_of_pages"]; ?></td>
                                                    <td><?php echo $row["mnth"]; ?></td>
                                                    <td><?php echo $row["lang"]; ?></td>
                                                    <td>
                                                        <div class="dropdown mb-4">
                                                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu animated--fade-in text-center bg-gray-200" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">
                                                                <a target="_blank" href="admin_print_invoice.php?id=<?php echo $row["Database_Invoice_No"]; ?>" class="btn btn-primary">
                                                                    <span class="text">Print</span>
                                                                </a>
                                                                <a href="admin_all_invoices.php?mail=1&id=<?php echo $row["Database_Invoice_No"]; ?>&email=<?php echo $row["email"]; ?>" target="_blank" class="btn btn-info">
                                                                    <span class="text">Email</span>
                                                                </a>
                                                                <a href="admin_edit_invoice.php?&id=<?php echo $row["Database_Invoice_No"]; ?>" target="_blank" class="btn btn-success">
                                                                    <span class="text">Edit</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
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
                    <?php
                        }
                    ?>
                </div>
                <!-- /.container-fluid -->
                <?php
                if(isset($_POST["add_course"])){
                    require 'parts/db.php';
                    $course_name = $_POST["course_name"];

                    $sql = "INSERT INTO courses (course_name) VALUES ('$course_name')";

                    if(phpRunSingleQuery($sql)){
                        js_redirect("admin_courses.php?success=1");
                    }else{
                        echo mysqli_error($con);
                    }
                }
                if(isset($_GET["del_course"])){
                    require 'parts/db.php';
                    $id = $_GET["del_course"];

                    $sql = "DELETE FROM  courses WHERE id = $id";

                    if(phpRunSingleQuery($sql)){
                        js_redirect("admin_courses.php");
                    }else{
                        echo mysqli_error($con);
                    }
                }
                ?>

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
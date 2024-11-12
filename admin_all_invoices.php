<?php
require 'parts/app.php';
if(isset($_GET["mail"])){
    $id = $_GET["id"];
    $path = "https://www.18jorissen.co.za/abc/admin_print_invoice.php?id=$id";


    $to = $_GET["email"];
    $subject = "ABC International - Invoice";
    $txt = "Please <a href='$path'>CLICK HERE</a> to get invoice.";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    if(mail($to,$subject,$txt,$headers)){
        js_redirect("admin_all_invoices.php?mailSent=1");
    }else{
        echo "============= MAIL WAS NOT SENT =============";
        exit(); die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Invoices";
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
                    if(isset($_GET["success"])){
                    ?>
                    <div class="card mb-4 py-3 border-left-success">
                        <div class="card-body text-success">
                            <strong>Success! </strong> Student Linked Successfully!
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET["mailSent"])){
                    ?>
                    <div class="card mb-4 py-3 border-left-success">
                        <div class="card-body text-success">
                            <strong>Success! </strong> Mail was sent to the registered Email!
                        </div>
                    </div>
                    <?php } ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Invoices Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>ABC Receipt</th>
                                        <th>Amount</th>
                                        <th>No of Pages</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>ABC Receipt</th>
                                        <th>Amount</th>
                                        <th>No of Pages</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM payments";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
//                                            $student_primary_id = $row["id"];
//                                            $rand = rand();
                                            ?>
                                            <tr>
                                                <td><?php echo $row["Database_Invoice_No"]; ?></td>
                                                <td><?php echo $row["userSelection"]=="Translation" ? $row["c_name"] : $row["Customer"]; ?></td>
                                                <td><?php echo $row["Invoice_Date"]; ?></td>
                                                <td><?php echo $row["ABC_Receipt_book"]; ?></td>
                                                <td><?php echo $row["Amount"]; ?></td>
                                                <td><?php echo $row["Tranlations_no_of_pages"]; ?></td>
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


    <script src="https://www.google.com/recaptcha/api.js?render=6LfSB9wbAAAAADM-RnT_SVz6w-4rDMtDCHYB6mdT"></script>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfSB9wbAAAAADM-RnT_SVz6w-4rDMtDCHYB6mdT', {action: 'submit'}).then(function(token) {
                    // Add your logic to submit to your backend server here.
                });
            });
        }
    </script>
</body>

</html>
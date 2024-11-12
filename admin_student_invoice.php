<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Student Invoice";
require 'parts/head.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                <strong>Success! </strong> Invoice Saved!
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Invoice</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="student_id" value="<?php echo rand(10000000, 99999999); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Customer</label>
                                            <select class="songs form-select w-100" name="student" multiple>
                                                <?php
                                                $s = "SELECT * FROM master_registration_list";
                                                $qry = mysqli_query($con, $s);
                                                while($row = mysqli_fetch_array($qry)){
                                                    ?>
                                                    <option value="<?php echo $row["student_name"]; ?>"><?php echo $row["student_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Invoice Date:</label>
                                            <input type="date" name="invoice_date" class="form-control" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Terms:</label>
                                            <input type="text" name="terms" class="form-control" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Memo:</label>
                                            <input type="text" name="memo" class="form-control" id="pwd">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Service Amount</label>
                                            <input type="number" class="form-control" name="amount" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Product/Service Description</label>
                                            <input type="text" name="product_description" class="form-control" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Description</label>
                                            <input type="text" name="description" class="form-control" id="pwd">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_invoice">
                                            <span class="fas fa-save"></span> Add Invoice
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["add_invoice"])){
                        require 'parts/db.php';
                        $student = $_POST["student"];
                        $invoice_date = $_POST["invoice_date"];
                        $terms = $_POST["terms"];
                        $memo = $_POST["memo"];
                        $amount = $_POST["amount"];
                        $product_description = $_POST["product_description"];
                        $description = $_POST["description"];



                        $sql = "INSERT INTO invoices (Customer, Invoice_Date, Terms, Memo, ProductService_Description,
                                      Description, ProductService_Amount) VALUES 
                                ('$student', '$invoice_date', '$terms', '$memo', '$product_description', '$description', $amount)";


                        if(phpRunSingleQuery($sql)){
                            js_redirect("admin_student_invoice.php?success=1");
                        }else{
//
                        }

                    }
                    ?>
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

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>-->
    <!--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
    <script src="js/select.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.songs').select2();
        });
    </script>
</body>

</html>
<?php
require 'parts/app.php';
if(isset($_POST["add_balance"])){
    $pageID = $_POST["pageID"];
    $amount = $_POST["amount"];
    $amount_paid = $_POST["amount_paid"];
    $s = "UPDATE payments SET balance=$amount, Amount='$amount_paid' WHERE Database_Invoice_No =$pageID";
    require_once 'parts/db.php';
    if(mysqli_query($con, $s)){
        js_redirect("admin_edit_invoice.php?id=$pageID&success=1");
    }else{
        echo mysqli_error($con); exit(); die();
    }
}
$pageID = isset($_GET["id"]) ? $_GET["id"] : 0;
$sql = "SELECT * FROM payments WHERE Database_Invoice_No  = $pageID";
$res = mysqli_query($con, $sql);
$pageRow = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Update Invoice";
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
                                <strong>Success! </strong> Balance Updated!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mx-auto">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Update balance in Invoice</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="admin_edit_invoice.php">
                                            <input type="hidden" name="pageID" value="<?php echo $pageID; ?>">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Current balance</label>
                                                <input type="number" min="0" class="form-control" name="amount" value="<?php echo $pageRow["Balance"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount Paid</label>
                                                <input type="number" min="0" class="form-control" name="amount_paid" value="<?php echo $pageRow["Amount"]; ?>">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary w-100" name="add_balance">
                                                <span class="fas fa-edit"></span>
                                                Update Balance
                                            </button>
                                        </form>
                                    </div>
                                </div>
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

</body>

</html>
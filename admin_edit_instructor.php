<?php
require 'parts/app.php';

$id = $_GET["id"];
$sql = "SELECT * FROM instructors WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);


?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Edit Instructor";
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
                            <strong>Success! </strong> Instructor Record Updated Successfully!
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- Page Heading -->
                <div class="card shadow mb-4 container-fluid ">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Instructor Registration</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="pageID" value="<?php echo $_GET["id"]; ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Hire Date:</label>
                                        <input type="date" name="registration_date" class="form-control" placeholder="Registration Date" id="email" value="<?php echo $row["hire_date"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Instructor ID:</label>
                                        <input type="text" name="instructor_id" class="form-control" placeholder="Registration Date" id="email" value="<?php echo $row["instructor_id"]; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" id="pwd" value="<?php echo $row["name"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Common Name:</label>
                                        <input type="text" name="common_name" class="form-control" placeholder="Name" id="pwd" value="<?php echo $row["common_name"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Email:</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" id="pwd" value="<?php echo $row["email"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Phone Number</label>
                                        <input type="text" name="phone_num" class="form-control" placeholder="Phone Number" id="pwd" value="<?php echo $row["phone"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Pay Frequency</label>
                                        <input type="date" name="frequency" class="form-control" placeholder="frequency" id="text" value="<?php echo $row["frequency"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="<?php echo $row["dob"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Resign Date:</label>
                                        <input type="date" name="resign" class="form-control" value="<?php echo $row["resign_date"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Identification:</label>
                                        <input type="text" name="identification" class="form-control" placeholder="Identity" value="<?php echo $row["identification"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">ID Number:</label>
                                        <input type="number" name="idNumber" class="form-control" placeholder="0123456789" value="<?php echo $row["idNumber"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Payment Method</label>
                                        <input type="text" name="paymentMethod" class="form-control" placeholder="Cash/EFT or any other" id="pwd" value="<?php echo $row["paymentMethod"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Bank Name</label>
                                        <input type="text" name="BankName" class="form-control" placeholder="Name of Bank" value="<?php echo $row["BankName"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Bank Code:</label>
                                        <input type="number" name="BankCode" class="form-control" placeholder="123456" value="<?php echo $row["BankCode"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Account Number:</label>
                                        <input type="number" name="AccountNumber" class="form-control" placeholder="2285851249" value="<?php echo $row["AccountNumber"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Account Type:</label>
                                        <input type="text" name="AccountType" class="form-control" placeholder="Saving/Current or other" id="pwd" value="<?php echo $row["AccountType"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Unit Number:</label>
                                        <input type="number" name="unitNumber" class="form-control" placeholder="1521" id="pwd" value="<?php echo $row["unitNumber"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Street Number</label>
                                        <input type="text" name="Street" class="form-control" placeholder="Street #" value="<?php echo $row["Street"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Town</label>
                                        <input type="text" name="town" class="form-control" placeholder="Town" value="<?php echo $row["town"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Zip Code:</label>
                                        <input type="number" name="zipCode" class="form-control" placeholder="54100" value="<?php echo $row["zipCode"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Job Title</label>
                                        <input type="text" name="JobTitle" class="form-control" placeholder="Professor" value="<?php echo $row["JobTitle"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Income Text #</label>
                                        <input type="number" name="incomeTaxNumber" class="form-control" placeholder="51564165465" value="<?php echo $row["incomeTaxNumber"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Contact Number:</label>
                                        <input type="text" name="ContactNum" class="form-control" placeholder="Contact Number" value="<?php echo $row["ContactNum"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Emergency Contact 1</label>
                                        <input type="text" name="EmergencyContact1" class="form-control" placeholder="Emergency Contact 1" value="<?php echo $row["EmergencyContact1"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Emergency Contact 2</label>
                                        <input type="text" name="EmergencyContact2" class="form-control" placeholder="Emergency Contact 2" value="<?php echo $row["EmergencyContact2"]; ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_student">
                                        <span class="fas fa-save"></span> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if(isset($_POST["add_student"])){
                    require 'parts/db.php';
                    $pageID = $_POST["pageID"];
                    $registration_date = $_POST["registration_date"];
                    $name = $_POST["name"];
                    $common_name = $_POST["common_name"];
                    $instructor_id = $_POST["instructor_id"];
                    $email = $_POST["email"];
                    $phone_num = $_POST["phone_num"];
                    $frequency = $_POST["frequency"];
                    $dob = $_POST["dob"];
                    $resign = $_POST["resign"];
                    $identification = $_POST["identification"];
                    $idNumber = $_POST["idNumber"];
                    $paymentMethod = $_POST["paymentMethod"];
                    $BankName = $_POST["BankName"];
                    $BankCode = $_POST["BankCode"];
                    $AccountNumber = $_POST["AccountNumber"];
                    $AccountType = $_POST["AccountType"];
                    $unitNumber = $_POST["unitNumber"];
                    $Street = $_POST["Street"];
                    $town = $_POST["town"];
                    $zipCode = $_POST["zipCode"];
                    $JobTitle = $_POST["JobTitle"];
                    $incomeTaxNumber = $_POST["incomeTaxNumber"];
                    $ContactNum = $_POST["ContactNum"];
                    $EmergencyContact1 = $_POST["EmergencyContact1"];
                    $EmergencyContact2 = $_POST["EmergencyContact2"];

                    $sql = "UPDATE instructors SET name='$name', common_name='$common_name', email='$email', phone='$phone_num', frequency='$frequency', dob='$dob', resign_date='$resign',
                            identification='$identification', idNumber=$idNumber, paymentMethod='$paymentMethod', BankName='$BankName', BankCode=$BankCode, AccountNumber=$AccountNumber,
                            AccountType='$AccountType', unitNumber=$unitNumber, Street='$Street', town='$town', zipCode=$zipCode, JobTitle='$JobTitle', incomeTaxNumber=$incomeTaxNumber,
                            ContactNum='$ContactNum', EmergencyContact1='$EmergencyContact1', EmergencyContact2='$EmergencyContact2'
                            WHERE instructor_id=$instructor_id";


                    if(phpRunSingleQuery($sql)){
                        js_redirect("admin_edit_instructor.php?success=1&id=$pageID");
                    }else{
                        echo mysqli_error($con);
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

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
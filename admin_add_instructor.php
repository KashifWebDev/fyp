<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Add Instructor";
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
                            <strong>Success! </strong> Instructor Record added Successfully!
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Hire Date:</label>
                                        <input type="date" name="registration_date" class="form-control" placeholder="Registration Date" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Instructor ID:</label>
                                        <input type="text" name="instructor_id" class="form-control" placeholder="Registration Date" id="email" value="<?php echo rand(100000, 999999); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Common Name:</label>
                                        <input type="text" name="common_name" class="form-control" placeholder="Name" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Email:</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Phone Number</label>
                                        <input type="text" name="phone_num" class="form-control" placeholder="Phone Number" id="pwd">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Pay Frequency</label>
                                        <input type="date" name="frequency" class="form-control" placeholder="frequency" id="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Resign Date:</label>
                                        <input type="date" name="resign" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Identification:</label>
                                        <input type="text" name="identification" class="form-control" placeholder="Identity">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">ID Number:</label>
                                        <input type="number" name="idNumber" class="form-control" placeholder="0123456789">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Payment Method</label>
                                        <input type="text" name="paymentMethod" class="form-control" placeholder="Cash/EFT or any other" id="pwd">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Bank Name</label>
                                        <input type="text" name="BankName" class="form-control" placeholder="Name of Bank">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Bank Code:</label>
                                        <input type="number" name="BankCode" class="form-control" placeholder="123456">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Account Number:</label>
                                        <input type="number" name="AccountNumber" class="form-control" placeholder="2285851249">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Account Type:</label>
                                        <input type="text" name="AccountType" class="form-control" placeholder="Saving/Current or other" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Unit Number:</label>
                                        <input type="number" name="unitNumber" class="form-control" placeholder="1521" id="pwd">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Street Number</label>
                                        <input type="text" name="Street" class="form-control" placeholder="Street #">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Town</label>
                                        <input type="text" name="town" class="form-control" placeholder="Town">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Zip Code:</label>
                                        <input type="number" name="zipCode" class="form-control" placeholder="54100">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Job Title</label>
                                        <input type="text" name="JobTitle" class="form-control" placeholder="Professor">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Income Text #</label>
                                        <input type="number" name="incomeTaxNumber" class="form-control" placeholder="51564165465">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Contact Number:</label>
                                        <input type="text" name="ContactNum" class="form-control" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Emergency Contact 1</label>
                                        <input type="text" name="EmergencyContact1" class="form-control" placeholder="Emergency Contact 1">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Emergency Contact 2</label>
                                        <input type="text" name="EmergencyContact2" class="form-control" placeholder="Emergency Contact 2">
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
                    $registration_date = isset($_POST["registration_date"]) ? $_POST["registration_date"] : '';
                    $name = isset($_POST["name"]) ? $_POST["name"] : '';
                    $common_name = isset($_POST["common_name"]) ? $_POST["common_name"] : '';
                    $instructor_id = isset($_POST["instructor_id"]) ? $_POST["instructor_id"] : '';
                    $email = isset($_POST["email"]) ? $_POST["email"] : '';
                    $phone_num = isset($_POST["phone_num"]) ? $_POST["phone_num"] : '';
                    $frequency = isset($_POST["frequency"]) ? $_POST["frequency"] : '';
                    $dob = isset($_POST["dob"]) ? $_POST["dob"] : '';
                    $resign = $_POST["resign"]=="" ? date('Y-m-d') : $_POST["resign"];
                    $identification = isset($_POST["identification"]) ? $_POST["identification"] : '';
                    $idNumber = isset($_POST["idNumber"]) ? $_POST["idNumber"] : '';
                    $paymentMethod = isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] : '';
                    $BankName = isset($_POST["BankName"]) ? $_POST["BankName"] : '';
                    $BankCode = isset($_POST["BankCode"]) ? $_POST["BankCode"] : '';
                    $AccountNumber = isset($_POST["AccountNumber"]) ? $_POST["AccountNumber"] : '';
                    $AccountType = isset($_POST["AccountType"]) ? $_POST["AccountType"] : '';
                    $unitNumber = isset($_POST["unitNumber"]) ? $_POST["unitNumber"] : '';
                    $Street = isset($_POST["Street"]) ? $_POST["Street"] : '';
                    $town = isset($_POST["town"]) ? $_POST["town"] : '';
                    $zipCode = isset($_POST["zipCode"]) ? $_POST["zipCode"] : '';
                    $JobTitle = isset($_POST["JobTitle"]) ? $_POST["JobTitle"] : '';
                    $incomeTaxNumber = isset($_POST["incomeTaxNumber"]) ? $_POST["incomeTaxNumber"] : '';
                    $ContactNum = isset($_POST["ContactNum"]) ? $_POST["ContactNum"] : '';
                    $EmergencyContact1 = isset($_POST["EmergencyContact1"]) ? $_POST["EmergencyContact1"] : '';
                    $EmergencyContact2 = isset($_POST["EmergencyContact2"]) ? $_POST["EmergencyContact2"] : '';

                    $sql = "INSERT INTO instructors (instructor_id, name, hire_date, phone, email, common_name,frequency, dob, resign_date, identification, idNumber, paymentMethod, BankName,
                         BankCode, AccountNumber, AccountType, unitNumber, Street, town, zipCode, JobTitle, incomeTaxNumber, ContactNum, EmergencyContact1, EmergencyContact2) VALUES 
                                ('$instructor_id', '$name', '$registration_date', '$phone_num', '$email', '$common_name', '$frequency', '$dob', '$resign', '$identification', '$idNumber', '$paymentMethod', '$BankName',
                                 $BankCode, '$AccountNumber', '$AccountType', $unitNumber, '$Street', '$town', $zipCode, '$JobTitle', '$incomeTaxNumber', '$ContactNum', '$EmergencyContact1', '$EmergencyContact2')";

                    if(phpRunSingleQuery($sql)){
                        js_redirect("admin_add_instructor.php?success=1");
                    }else{
                        echo "ERROR: ".mysqli_error($con);
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
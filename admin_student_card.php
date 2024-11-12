<?php
require 'parts/app.php';
if(isset($_GET["mail"])){
    $id = $_GET["id"];
    $path = "https://abcdatabase.online/permit.php?id=$id";

    $sql = "SELECT * FROM master_registration_list WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);

    $to = $row["email"];
    $name = $row["student_name"];
    $subject = "Student Permit Letter";
    $txt = "Dear $name,<br>";
    $txt .= "Please find your report for (level) in the attached document.
     Kindly note that Rewrites (all subjects below 65%) are compulsory to complete if you are to move to the next level. <br><br>";
    $txt .= "<br><a href='$path' style='text-decoration: none;background: #202a5b;color: white;padding: 5px 10px;border-radius: 10px;font-size: 20px;'>click here to receive your letter</a><br><br><br>";
    $txt .= "Should you need any help or support, please do not hesitate to reach out.<br><br>";
    $txt .= "Kind Regards,<br>";
    $txt .= "ABC International Admin Team";


//    echo $txt; exit(); die();

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();



    if(mail($to,$subject,$txt,$headers)){
        js_redirect("admin_student_card.php?mailSent=1");
    }else{
        echo "============= MAIL WAS NOT SENT =============";
        exit(); die();
    }
}
if(isset($_GET["send_grades"])){
    $course_id = $_GET["course_id"];
    $student_id = $_GET["student_id"];
//    $month = $_GET["month"];


    $path = "https://abcdatabase.online/admin_marks.php?student_id=$student_id&course_id=$course_id";

    $sql = "SELECT * FROM master_registration_list WHERE id = '$student_id'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    $to = $row["email"];
    $subject = "Student Grades Sheet";
    $txt = "Please <a href='$path'>CLICK HERE</a> to get your grades Sheet.";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    if(mail($to,$subject,$txt,$headers)){
        js_redirect("admin_student_card.php?mailSent=1");
    }else{
        echo "============= MAIL WAS NOT SENT =============";
        exit(); die();
    }
}
if(isset($_POST["link_roster"])){
    $course_id = $_POST["course_id"];
    $student_id = $_POST["student_id"];
    $month = $_POST["month"];
    $sql = "INSERT INTO roster (student_id, course_id, month) VALUES ($student_id, $course_id, '$month')";
    if(phpRunSingleQuery($sql)){
        js_redirect("admin_linked_courses.php");
    }else{
        echo mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Student Card";
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
                            <h6 class="m-0 font-weight-bold text-primary">Student Cards Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Passport #</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Passport #</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM master_registration_list";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $student_primary_id = $row["id"];
                                            $rand = rand();
                                            ?>
                                            <tr>
                                                <td><?php echo $student_primary_id; ?></td>
                                                <td><?php echo $row["student_id"]; ?></td>
                                                <td><?php echo $row["student_name"]; ?></td>
                                                <td><?php echo $row["passport_no"]; ?></td>
                                                <td><?php echo $row["dob"]; ?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in text-center bg-gray-200 px-3" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">
                                                            <a target="_blank" href="admin_show_card.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">
                                                                <span class="text">Student Card</span>
                                                            </a>
                                                            <a href="permit.php?id=<?php echo $row["id"]; ?>" target="_blank" class="btn btn-info">
                                                                <span class="text">View Permit</span>
                                                            </a>
                                                            <a href="admin_student_card.php?id=<?php echo $row["id"]; ?>&mail=sent" class="btn btn-success">
                                                                <span class="text">Email Permit</span>
                                                            </a>
                                                            <a class="btn btn-danger" href="admin_enter_grades.php?id=<?php echo $row["id"]; ?>">
                                                                <span class="text">Enter Grades</span>
                                                            </a>
                                                            <a class="btn btn-warning" id="viewGrade_btn" onclick="viewGradeModal(<?php echo $row["id"]; ?>)">
                                                                <span class="text">View Grades</span>
                                                            </a>
                                                            <a class="btn btn-success" onclick="emailGradeModal(<?php echo $row["id"]; ?>)">
                                                                <span class="text">Email Grades Sheet</span>
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

                <script>
                    function viewGradeModal(id){
                        $('#ViewGrades').modal('show');
                        $('#student_id_Input').val(id);
                    }
                    function emailGradeModal(id){
                        console.log(id);
                        $('#EmailGrade').modal('show');
                        $('#student_id_Input_email').val(id);
                    }
                </script>

                <!-- ViewGrades -->
                <div class="modal" id="ViewGrades">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">View Grades</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="admin_marks.php" method="GET">
                                    <input type="hidden" name="student_id" id="student_id_Input" value="">
                                    <div class="form-group">
                                        <label for="sel1">Select Course:</label>
                                        <select class="form-control" name="course_id">
                                            <option>-- SELECT --</option>
                                            <?php
                                            $s = "SELECT * FROM courses";
                                            $r = mysqli_query($con, $s);
                                            if(mysqli_num_rows($r)){
                                                while($roww = mysqli_fetch_array($r)){
                                                    ?>
                                                    <option value="<?php echo $roww["id"]; ?>"><?php echo $roww["course_name"]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">Select Month:</label>
                                        <select class="form-control" name="month">
                                            <option>-- SELECT --</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">Select Year:</label>
                                        <select class="form-control" name="year">
                                            <option>-- SELECT --</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2023">2024</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" name="link" class="btn-info w-100 btn">
                                                Run Report
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- EmailGrade -->
                <div class="modal" id="EmailGrade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Email Grades</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="admin_student_card.php" method="GET">
                                    <input type="hidden" name="student_id" id="student_id_Input_email" value="">
                                    <div class="form-group">
                                        <label for="sel1">Select Course:</label>
                                        <select class="form-control" name="course_id">
                                            <option>-- SELECT --</option>
                                            <?php
                                            $s = "SELECT * FROM courses";
                                            $r = mysqli_query($con, $s);
                                            if(mysqli_num_rows($r)){
                                                while($roww = mysqli_fetch_array($r)){
                                                    ?>
                                                    <option value="<?php echo $roww["id"]; ?>"><?php echo $roww["course_name"]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" name="send_grades" class="btn-info w-100 btn">
                                                Send Report
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

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
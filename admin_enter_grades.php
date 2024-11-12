<?php
require 'parts/app.php';
$id = $_GET["id"];
$sql = "SELECT * FROM master_registration_list WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = $mainRow = mysqli_fetch_array($res);

$course_id_page= $_GET["courseID"] ?? '';
$mnth_page= $_GET["mnth"] ?? '';


if(isset($_GET["sendMail"])){
    $id = $_GET["id"];
    $path = "https://www.18jorissen.co.za/abc/permit.php?id=$id";

    $sql = "SELECT * FROM master_registration_list WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);

    $to = $row["email"];
    $subject = "Student Permit Letter";
    $txt = "Please <a href='$path'>CLICK HERE</a> to get your permit letter.";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    if(mail($to,$subject,$txt,$headers)){
        js_redirect("admin_enter_grades.php?mailSent=1&id=$id");
    }else{
        echo "============= MAIL WAS NOT SENT =============";
        exit(); die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Enter Grades";
require 'parts/head.php';
?>

<link rel="stylesheet" href="css/bootstrap-select.min.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/readable/bootstrap.min.css">-->

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
                                <strong>Success! </strong> Marks Entered!
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <a target="_blank" href="admin_marks.php?student_id=<?php echo $_GET["id"]; ?>&course_id=<?php echo $_GET["course_id"]; ?>" class="btn btn-success">Print Report</a>
                            <a href="admin_enter_grades.php?sendMail=1&id=<?php echo $_GET["id"]; ?>" class="btn btn-danger ml-2">Email Report</a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_GET["mailSent"]) && $_GET["mailSent"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Mail Sent!
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <a target="_blank" href="admin_marks.php?student_id=<?php echo $_GET["id"]; ?>&course_id=<?php echo $_GET["course_id"]; ?>" class="btn btn-success">Print Report</a>
                            <a href="admin_enter_grades.php?sendMail=1&id=<?php echo $_GET["id"]; ?>" class="btn btn-danger ml-2">Email Report</a>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Registration</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $mainRow["id"]; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Student ID</label>
                                            <input type="text" name="student_name_id" class="form-control" id="email" value="<?php echo $mainRow["student_id"]; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Student Name</label>
                                            <input type="text" name="student_name" class="form-control" id="email" value="<?php echo $mainRow["student_name"]; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Select Instructor:</label>
                                            <select class="form-control" name="instructor_id">
                                                <option>-- SELECT --</option>
                                                <?php
                                                $s = "SELECT * FROM instructors";
                                                $r = mysqli_query($con, $s);
                                                if(mysqli_num_rows($r)){
                                                    while($roww = mysqli_fetch_array($r)){
                                                        ?>
                                                        <option value="<?php echo $roww["id"]; ?>"><?php echo $roww["name"]; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Attendance (Number of Days Absent)</label>
                                            <input type="number" name="attendance" class="form-control" id="email" value="0">
                                        </div>
                                        <?php
                                        if(isset($_GET["courseID"])){
                                            ?>
                                            <input type="hidden" name="course_id" value="<?php echo $course_id_page; ?>">
                                            <input type="hidden" name="month" value="<?php echo $mnth_page; ?>">
                                        <?php
                                        }else{
                                            ?>
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
                                        <?php
                                        }
                                        ?>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="sel1">Enter Marks:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Grammar</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub1" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Vocabulary</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub2" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Comprehension</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub3" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Composition</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub4" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Pronunciation</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub5" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Prepared Speaking</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub6" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Unprepared Speaking</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub7" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Reading</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub8" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Dictation</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub9" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Active Listening</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub10" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Online Learning Management System</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub11" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number OF Compositions</span>
                                            </div>
                                            <input type="number" class="form-control" name="sub12" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_student">
                                            <span class="fas fa-save"></span> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["add_student"])){
                            $student_id = $_POST["student_id"];
                            $instructor_id = $_POST["instructor_id"];
                            $course_id = $_POST["course_id"];
                            $month = $_POST["month"];
                            $sub1 = isset($_POST["sub1"]) ? $_POST["sub1"] : 0;
                            $sub2 = isset($_POST["sub2"]) ? $_POST["sub2"] : 0;
                            $sub3 = isset($_POST["sub3"]) ? $_POST["sub3"] : 0;
                            $sub4 = isset($_POST["sub4"]) ? $_POST["sub4"] : 0;
                            $sub5 = isset($_POST["sub5"]) ? $_POST["sub5"] : 0;
                            $sub6 = isset($_POST["sub6"]) ? $_POST["sub6"] : 0;
                            $sub7 = isset($_POST["sub7"]) ? $_POST["sub7"] : 0;
                            $sub8 = isset($_POST["sub8"]) ? $_POST["sub8"] : 0;
                            $sub9 = isset($_POST["sub9"]) ? $_POST["sub9"] : 0;
                            $sub10 = isset($_POST["sub10"]) ? $_POST["sub10"] : 0;
                            $sub11 = isset($_POST["sub11"]) ? $_POST["sub11"] : 0;
                            $sub12 = isset($_POST["sub12"]) ? $_POST["sub12"] : 0;
                            $attendance = $_POST["attendance"];


                        $sql = "INSERT INTO grades (student_id, month, course_id, instructor_id, sub1, sub2, sub3, sub4, sub5, sub6, sub7, sub8, sub9, sub10, sub11, sub12,attendance) VALUES 
                                ($student_id, '$month', $course_id, $instructor_id, $sub1, $sub2, $sub3, $sub4, $sub5, $sub6, $sub7, $sub8, $sub9, $sub10, $sub11, $sub12, $attendance)";

                        if(phpRunSingleQuery($sql)){
                            js_redirect("admin_enter_grades.php?id=$student_id&success=1&course_id=$course_id");
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<!--Country dropdown-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="js/countrypicker.js?v=<?php echo rand(); ?>"></script>
</body>

</html>
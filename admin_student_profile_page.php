<?php
require 'parts/app.php';

$id = $pageID = $_GET["id"];
$sql = "SELECT *  FROM master_registration_list WHERE id = $id";
$res = mysqli_query($con, $sql);
$student = mysqli_fetch_array($res);
$student_name = $student["student_name"];
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Student Profile";
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
                    <div class="my-4 py-2 px-4 bg-secondary text-white">
                        Personal Information
                    </div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="img/students/<?php echo $student["pic"]; ?>" class="img-fluid rounded-pill" alt="" style="max-height: 220px;">
                            </div>
                            <div class="col-md-4">
                                <p>
                                    <span class="mr-2 fas fa-hashtag"></span><b>ID</b>
                                    <?php echo $student["id"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-user-circle"></span><b>Name</b>
                                    <?php echo $student["student_name"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-calendar-alt"></span><b>Registration</b>
                                    <?php echo $student["registration_date"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-flag"></span><b>Country</b>
                                    <?php echo $student["country"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-passport"></span><b>Passport</b>
                                    <?php echo $student["passport_no"]; ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>
                                    <span class="mr-2 fas fa-calendar-day"></span><b>DOB</b>
                                    <?php echo $student["dob"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-phone-square-alt"></span><b>Contact</b>
                                    <?php echo $student["phone_no"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-at"></span><b>Email</b>
                                    <?php echo $student["email"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-map-marker-alt"></span><b>Address</b>
                                    <?php echo $student["address_S_A"]; ?>
                                </p>
                                <p>
                                    <span class="mr-2 fas fa-thumbs-up"></span><b>Facebook / Insta</b>
                                    <?php echo $student["facebook"].' / '.$student["insta"]; ?>
                                </p>
                            </div>
                        </div>

                    <div class="mt-4 py-2 px-4 bg-secondary text-white">
                        Academic History
                    </div>

                    <table class="table table-striped text-center table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"> <i class="fas fa-book"></i> Course</th>
                            <th scope="col"> <i class="fas fa-calendar-week"></i> Month</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM courses_and_students WHERE student_id=$id GROUP BY roster_id";
//                            echo $sql;
                            $res = mysqli_query($con, $sql);
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_array($res)){
                                    $roster_id = $row["roster_id"];
                                    $sql = "SELECT * FROM roster WHERE id=$roster_id";
                                    $res1 = mysqli_query($con, $sql);
                                    $r1 = mysqli_fetch_array($res1);
                                    $month = $r1["month"];
                                    $courseID = $r1["course_id"];
                                    $sql = "SELECT * FROM courses WHERE id=$courseID";
                                    $res1 = mysqli_query($con, $sql);
                                    $r1 = mysqli_fetch_array($res1);
                                    $courseName = $r1["course_name"];
                                    ?>
                                    <tr>
                                        <td><?php echo $month; ?></td>
                                        <td><?php echo $courseName; ?></td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>

                    <div class="mt-4 py-2 px-4 bg-secondary text-white">
                        Payments
                    </div>

                    <table class="table table-striped text-center table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"> <i class="fas fa-calender"></i> Date</th>
                            <th scope="col"> <i class="fas fa-money-bill-alt"></i> Amount</th>
                            <th scope="col"> <i class="fas fa-money-bill-alt"></i> Balance</th>
                            <th scope="col"> <i class="fas fa-money-bill-list"></i> Notes</th>
                            <th scope="col"> <i class="fas fa-money-bill-list"></i> Services</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM payments WHERE Customer='$student_name'";
                            $res = mysqli_query($con, $sql);
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_array($res)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["Invoice_Date"]; ?></td>
                                        <td><?php echo $row["Amount"]; ?></td>
                                        <td><?php echo $row["Balance"]; ?></td>
                                        <td><?php echo $row["ProductService_Description"].' '.$row["Notes"].' '.$row["mnth"]; ?></td>
                                        <td><?php echo str_replace("|",", ",$row["userSelection"]); ?></td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>


                    <div class="my-4 py-2 px-4 bg-secondary text-white">
                        Quick Actions
                    </div>

                    <button  class="btn btn-primary" data-toggle="modal" data-target="#ViewGrades">
                        View / Print Grades
                    </button>
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
                                        <input type="hidden" name="student_id" id="student_id_Input" value="<?php echo $pageID; ?>">
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
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" name="link" class="btn-primary w-100 btn">
                                                    Run Report
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <button  class="btn btn-success" data-toggle="modal" data-target="#EmailGrade">
                        Email Grades
                    </button>
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
                                        <input type="hidden" name="student_id" id="student_id_Input_email" value="<?php echo $pageID; ?>">
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
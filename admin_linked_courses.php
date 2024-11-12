<?php
require 'parts/app.php';
if(isset($_GET["sendMail"])){
    $msg = "Dear Student<br><br>
        It is with great pleasure to invite you to ABC International 2021 Graduation Ceremony and Celebration. <br>
        Date: Tuesday the 14th of December 2021<br>
        Time: 8:30am – 3pm<br>
        Address: 122 De Korte Street Braamfontein<br><br>
        Lunch will be served.<br><br>
        All students who have completed Intermediate 2 will receive an award. <br><br>
        Please reserve your place (RSVP) and send an email to<br>
        info@abcinternational.co.za<br>
        Call / WatsApp Nono: 0788610102<br>
        Veronica: 082 572 3987<br>
        Or call the ABC office 011 403 2171<br><br>
        This will be an event never to forget and your presence will be honoured. <br><br>
        Kind regards<br><br>
        Kim Wetzl<br>
        Principal<br>
        ABC International<br>";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    $rosterID = $_GET["sendMail"];
    $sql = "SELECT * FROM courses_and_students WHERE roster_id=$rosterID GROUP BY student_id";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_array($res)){
            $studentID = $row["student_id"];
            $s = "SELECT * FROM master_registration_list WHERE id=$studentID";
            $qry = mysqli_query($con, $s);
            if(mysqli_num_rows($qry)){
                while($r = mysqli_fetch_array($qry)){
                    $email = $r["email"];
                    mail($email,"Rewards Distribution Ceremony",$msg,$headers);
                }
                js_redirect("admin_linked_courses.php?rewardsMailSent=1");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Linked Courses";
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
                                <strong>Success! </strong> Instructor linked successfully!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["rewardsMailSent"]) && $_GET["rewardsMailSent"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Rewards E-mail was send to the selected roster!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["roster"]) && $_GET["roster"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Roster Created successfully!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Linked Courses</h6>
                        </div>
                        <div class="card-body">

                            <button type="button" name="add_course" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Create New Roster</button>
                            <!-- Add New Admin Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Roster</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="" method="post">
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
                                                <button type="submit" class="btn btn-primary w-100" name="add_roster">
                                                    <i class="fas fa-save"></i> Add
                                                </button>
                                            </form>
                                        </div>
                                        <?php
                                        if(isset($_POST["add_roster"])){
//                                            require 'parts/db.php';
                                            $course_id = $_POST["course_id"];
                                            $month = $_POST["month"];

                                            $sql = "INSERT INTO roster (month, course_id) VALUES 
                                                    ('$month', $course_id)";

                                            if(phpRunSingleQuery($sql)){
                                                js_redirect("admin_linked_courses.php?roster=1");
                                            }else{
                                                echo mysqli_error($con); exit(); die();
                                            }

                                        }
                                        if(isset($_GET["del_user"])){
                                            $id = $_GET["del_user"];

                                            $sql = "DELETE FROM  admin_users WHERE id = $id";

                                            if(phpRunSingleQuery($sql)){
                                                js_redirect("admin_users.php");
                                            }else{
                                                echo mysqli_error($con);
                                            }
                                        }
                                        ?>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                <i class="fas fa-times"></i> Cancel
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Instructor</th>
                                        <th>Month</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Instructor</th>
                                        <th>Month</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM roster";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $cID = $row["course_id"];
                                            $mnth = $row["month"];
                                            $linkID = $row["id"];
                                            $s = "SELECT * FROM courses WHERE id=$cID";
                                            $r = mysqli_query($con, $s);
                                            $ro = mysqli_fetch_array($r);
                                            $course_name = $ro["course_name"];
                                            $s = "SELECT * FROM courses_and_instructors WHERE roster_id=$linkID order by id DESC";
                                            $r = mysqli_query($con, $s);
                                            $ro = mysqli_fetch_array($r);
                                            $instID = $ro["instructor"];
                                            $s = "SELECT * FROM instructors WHERE id=$instID";
                                            $r = mysqli_query($con, $s);
                                            $ro = mysqli_fetch_array($r);
                                            $instName = $ro["name"];
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $course_name; ?></td>
                                                <td><?php echo $instName; ?></td>
                                                <td><?php echo $mnth; ?></td>
                                                <td>
                                                    <a href="admin_show_roster.php?id=<?php echo $linkID; ?>" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-calendar-check"></i>
                                                        </span>
                                                        <span class="text">Monthly Roster</span>
                                                    </a>
                                                    <a href="admin_linked_courses.php?sendMail=<?php echo $linkID; ?>" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                        <span class="text">Rewards Mail</span>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    if(isset($_GET["unlink"])){
                                        require 'parts/db.php';
                                        $id = $_GET["unlink"];

                                        $sql = "DELETE FROM  roster WHERE id = $id";
                                        $sql1 = "DELETE FROM  courses_and_students WHERE roster_id = $id";
                                        phpRunSingleQuery($sql1);

                                        if(phpRunSingleQuery($sql)){
                                            js_redirect("admin_linked_courses.php");
                                        }else{
                                            echo mysqli_error($con);
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
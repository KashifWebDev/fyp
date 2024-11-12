<?php
require 'parts/app.php';

if(isset($_GET["delUser"])){
    $stdID = $_GET["student_id_Input"];
    $rosterID = $_GET["page_id"];
    $s = "DELETE FROM courses_and_students WHERE student_id='$stdID' AND roster_id=$rosterID";
//    echo $s; exit(); die();
    if(mysqli_query($con, $s)){
        js_redirect("admin_show_roster.php?id=$rosterID");
    }
}

if(isset($_GET["send_grades"])) {
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    $id = $page_id = $_GET["send_grades"];
    $s = "SELECT * FROM roster WHERE id=$id";
    $res = mysqli_query($con, $s);
    $row = $mainRow = mysqli_fetch_array($res);
    $courseID = $mainRow["course_id"];
    $month = $page_month = $row["month"];

    $sql = "SELECT * FROM courses_and_students WHERE roster_id=$page_id group by student_id";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_array($res)) {
            $mnth = $page_month;
            $student = $row["student_id"];
            $s = "SELECT email FROM master_registration_list WHERE id=$student";
            $r = mysqli_query($con, $s);
            if (mysqli_num_rows($r)) {
                $ro = mysqli_fetch_array($r);
                $email = $ro["email"];
                if(isset($email) && !empty($email)){
                    $path = "https://www.18jorissen.co.za/abc/admin_marks.php?student_id=$student&course_id=$courseID";
                    $txt = "Please <a href='$path'>CLICK HERE</a> to get your grades Sheet.";
                    echo "To: " . $email . "     Link: " . $path . "<br>";
                    mail($email, "Student Grades Sheet", $txt, $headers);
                }
            }
        }
//        exit(); die();
        js_redirect("admin_show_roster.php?id=$id&mailSent=1");

    }
}

$id = $page_id = $_GET["id"];
$s = "SELECT * FROM roster WHERE id=$id";
$res = mysqli_query($con, $s);
$row = $mainRow = mysqli_fetch_array($res);
$courseID = $mainRow["course_id"];
$month = $page_month = $row["month"];

$s = "SELECT * FROM courses WHERE id=$courseID";
$res = mysqli_query($con, $s);
$courseRow = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Roster - $month";
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
                                <strong>Success! </strong> Instructor linked successfully!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["students"]) && $_GET["students"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Students Added successfully!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["mailSent"]) && $_GET["mailSent"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Mail was sent to all enrolled students of this class.
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["instructor"]) && $_GET["instructor"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Instructor Added successfully!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["marks"]) && $_GET["marks"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Marks entered successfully.
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="container-fluid">
                        <div class="card mb-4 py-3 border-left-primary">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-center text-primary" style="font-size: xx-large">
                                    <?php echo $mainRow["month"]; ?> - <?php echo $courseRow["course_name"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Roster</h6>
                        </div>
                        <div class="card-body">

                            <button type="button" name="add_course" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Add Students</button>
                            <!-- Add students -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Students to Roster</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="mb-3">
                                                    <input type="hidden" name="roster" value="<?php echo $_GET["id"]; ?>">
                                                    <label class="form-label">Students</label>
                                                    <select class="songs form-select w-100" name="students[]" multiple>
                                                        <?php
                                                            $s = "SELECT * FROM master_registration_list";
                                                            $qry = mysqli_query($con, $s);
                                                            while($row = mysqli_fetch_array($qry)){
                                                                ?>
                                                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["student_name"]; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100 add-dataa" name="add_user">
                                                    <i class="fas fa-save"></i> Add
                                                </button>
                                            </form>
                                        </div>
                                        <?php
                                        if(isset($_POST["add_user"])){
                                            $roster = $_POST["roster"];
                                            $s = "SELECT * FROM roster WHERE id = $roster";
                                            $qry = mysqli_query($con, $s);
                                            $r = mysqli_fetch_array($qry);
                                            $mnt = $r["month"];
                                            $course_id = $r["course_id"];

                                            $ids = implode(', ', $_POST['students']);

                                            foreach ($_POST['students'] as $key => $value) {
                                                $sql = "INSERT INTO courses_and_students (roster_id, student_id) VALUES ($page_id, $value)";
                                                mysqli_query($con, $sql);
                                            }
                                            js_redirect("admin_show_roster.php?students=1&id=$roster");
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

                            <button type="button" name="add_course" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#myModal1">Add Instructors</button>
                            <!-- Add Instructors -->
                            <div class="modal" id="myModal1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Instructor to Roster</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="mb-3">
                                                    <input type="hidden" name="roster" value="<?php echo $_GET["id"]; ?>">
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
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100 add-dataa" name="add_instructor">
                                                    <i class="fas fa-save"></i> Add
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                <i class="fas fa-times"></i> Cancel
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a href="admin_show_roster.php?send_grades=<?php echo $page_id; ?>" class="btn btn-success mb-2">Email Grades</a>

                            <?php
                            if(isset($_POST["add_instructor"])){
                                $roster = $_POST["roster"];
                                $instructor_id = $_POST["instructor_id"];

                                $sql = "INSERT INTO courses_and_instructors (roster_id, instructor) VALUES ($roster, $instructor_id)";
                                mysqli_query($con, $sql);

                                js_redirect("admin_show_roster.php?instructor=1&id=$roster");
                            }
                            if(isset($_POST["add_user"])){
                                $roster = $_POST["roster"];
                                $s = "SELECT * FROM roster WHERE id = $roster";
                                $qry = mysqli_query($con, $s);
                                $r = mysqli_fetch_array($qry);
                                $mnt = $r["month"];
                                $course_id = $r["course_id"];

                                $ids = implode(', ', $_POST['students']);

                                foreach ($_POST['students'] as $key => $value) {
                                    $sql = "INSERT INTO courses_and_students (roster_id, student_id) VALUES ($page_id, $value)";
                                    mysqli_query($con, $sql);
                                }
                                js_redirect("admin_show_roster.php?students=1&id=$roster");
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

                            <div class="card mb-4 py-1 ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="m-0 font-weight-bold text-primary" style="font-size: large;">Instructors:</p>
                                        <p class="ml-2" style="font-size: large;font-weight: bold;">
                                            <?php
                                                $s = "SELECT * FROM courses_and_instructors WHERE roster_id=$page_id ORDER BY id DESC LIMIT 1";
                                                $q = mysqli_query($con, $s);
                                                if(mysqli_num_rows($q)){
                                                    $r = mysqli_fetch_array($q);
                                                    $inst_id = $r["instructor"];
                                                    $s = "SELECT * FROM instructors WHERE id=$inst_id";
                                                    $q = mysqli_query($con, $s);
                                                    $r = mysqli_fetch_array($q);
                                                    echo $r["name"];
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="m-0 font-weight-bold text-primary" style="font-size: large;">Total Students:</p>
                                        <p class="ml-2" style="font-size: large;font-weight: bold;">
                                            <?php
                                                $s = "SELECT * FROM courses_and_students WHERE roster_id=$page_id group by student_id";
                                                $q = mysqli_query($con, $s);
                                                echo mysqli_num_rows($q);
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Paid</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Paid</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT student_id FROM courses_and_students WHERE roster_id=$page_id group by student_id";
                                    //echo $sql;
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $mnth = $page_month;
                                            $student = $row["student_id"];
                                            $s = "SELECT id, student_id, student_name FROM master_registration_list WHERE id=$student";
                                            $r = mysqli_query($con, $s);
                                            $student_id = $student_name = "";
                                            if(mysqli_num_rows($r)){
                                                $ro = mysqli_fetch_array($r);
                                                $student_real_id = $ro["id"];
                                                $student_id = $ro["student_id"];
                                                $student_name = $ro["student_name"];
                                            }
                                            $paid = false;
                                            $s = "SELECT * FROM payments WHERE 
                                                    Customer='$student_name' && (ProductService_Description LIKE '%$page_month%' OR mnth='$page_month')
                                                    order by Database_Invoice_No DESC";
                                            $r = mysqli_query($con, $s);
                                            $x["Database_Invoice_No"] = 0;
                                            if(mysqli_num_rows($r)){
                                                $paid = "paid";
                                                $x = mysqli_fetch_array($r);
                                                if($x["Balance"]!=0){
                                                    $paid="pending";
                                                }
                                            }else{
                                                $paid = "unpaid";
                                            }
                                            $invoiceID = $x["Database_Invoice_No"];
                                            ?>
                                            <tr>
                                                <td><?php echo $student_id; ?></td>
                                                <td><?php echo $student_name; ?></td>
                                                <td>
                                                    <a href=admin_print_invoice.php?id=<?php echo $invoiceID; ?> style="text-decoration: none;">
                                                    <?php
                                                    if($paid=="paid") echo '<span class="bg-success text-white px-2 py-1" style="border-radius: 10px;">Paid</span>';
                                                    if($paid=="unpaid") echo  '<span class="bg-danger text-white px-2 py-1" style="border-radius: 10px;">Un Paid</span>';
                                                    if($paid == "pending") echo  '<span class="bg-warning text-white px-2 py-1" style="border-radius: 10px;">Pending</span>';
                                                    ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" onclick="delUser('<?php echo $student_real_id; ?>')">
                                                        Delete
                                                    </button>
                                                    <a class="btn btn-primary" href="admin_enter_grades.php?id=<?php echo $student_real_id; ?>&courseID=<?php echo $courseID; ?>&mnth=<?php echo $mnth; ?>">
                                                        <span class="text">Enter Grades</span>
                                                    </a>
                                                    <a class="btn btn-warning" href="admin_roaster_edit_grades.php?rid=<?=$_GET["id"]?>&id=<?php echo $student_real_id; ?>&courseID=<?php echo $courseID; ?>&mnth=<?php echo $mnth; ?>">
                                                        <span class="text">Edit Grades</span>
                                                    </a>
                                                    <a class="btn btn-info" href="admin_marks.php?course_id=<?php echo $courseID; ?>&student_id=<?php echo $student_real_id; ?>">
                                                        <span class="text">View Grades</span>
                                                    </a>
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
                    function delUser(id){
                        $('#delUser').modal('show');
                        $('#student_id_Input').val(id);
                    }
                </script>                <!-- ViewGrades -->
                <div class="modal" id="delUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Delete User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="admin_show_roster.php" method="GET">
                                    <input type="hidden" name="student_id_Input" id="student_id_Input" value="">
                                    <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
                                    <span>Do you really want to <b>delete</b> this user?</span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" name="delUser" class="btn-danger w-100 btn">
                                                Delete
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn-secondary w-100 btn" data-dismiss="modal" type="button">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
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

        $('body').on('click', '.add-data', function (event) {
            event.preventDefault();
            var name = $('input[name=name]').val();
            var songs = $('.songs').val();
            console.log(songs);
            // $.ajax({
            //     method: 'POST',
            //     url: './database/db.php',
            //     data: {
            //         name: name,
            //         songs: songs,
            //     },
            //     success: function (data) {
            //         console.log(data);
            //         $('.res-msg').css('display', 'block');
            //         $('.alert-success').text(data).show();
            //         $('input[name=name]').val('');
            //         $(".songs").val('').trigger('change');
            //
            //         setTimeout(function () {
            //             $('.alert-success').hide();
            //         }, 3500);
            //     }
            // });
        });

        // $("#myModal > div > div > div.modal-body > form > div > span").addClass("w-100");
        $("#myModal > div > div > div.modal-body > form > div > span").css("width", "100% !important");
        $("#myModal > div > div > div.modal-body > form > div > span").attr('style','width: 100% !important');
        // $("#myModal > div > div > div.modal-body > form > div > span").addClass(".w-100");
    </script>

</body>

</html>
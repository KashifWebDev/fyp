<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Course Management";
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
                                <strong>Success! </strong> Course added Successfully!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registered Courses Record</h6>
                        </div>
                        <div class="card-body">

                            <div class="row my-2">
                                <div class="col-md-6 mx-auto d-flex justify-content-around">
                                    <form class="form-inline" action="" method="POST">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" class="form-control" name="course_name" placeholder="Add new course">
                                        </div>
                                        <button type="submit" name="add_course" class="btn btn-primary mb-2">Add Course</button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
<!--                                        <th>Actions</th>-->
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
<!--                                        <th>Actions</th>-->
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM courses";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["course_name"]; ?></td>
<!--                                                <td>-->
<!--                                                    <a href="admin_courses.php?del_course=--><?php //echo $row["id"]; ?><!--" class="btn btn-danger btn-icon-split">-->
<!--                                                        <span class="icon text-white-50">-->
<!--                                                            <i class="fas fa-trash"></i>-->
<!--                                                        </span>-->
<!--                                                        <span class="text">Delete</span>-->
<!--                                                    </a>-->
<!--                                                </td>-->
                                            </tr>
                                    <?php
                                        }
                                    }
                                    if(isset($_POST["link"])){
                                        $instructor_id = $_POST["instructor_id"];
                                        $course_id = $_POST["course_id"];
                                        $month = $_POST["month"];
                                        $sql = "INSERT INTO courses_and_instructors (instructor, course, month) VALUES ($instructor_id, $course_id, '$month')";
//                                        echo $sql; exit(); die();

                                        if(phpRunSingleQuery($sql)){
                                            js_redirect("admin_linked_courses.php?success=1");
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
                <?php
                if(isset($_POST["add_course"])){
                    require 'parts/db.php';
                    $course_name = $_POST["course_name"];

                    $sql = "INSERT INTO courses (course_name) VALUES ('$course_name')";

                    if(phpRunSingleQuery($sql)){
                        js_redirect("admin_courses.php?success=1");
                    }else{
                        echo mysqli_error($con);
                    }
                }
//                if(isset($_GET["del_course"])){
//                    require 'parts/db.php';
//                    $id = $_GET["del_course"];
//
//                    $sql = "DELETE FROM  courses WHERE id = $id";
//
//                    if(phpRunSingleQuery($sql)){
//                        js_redirect("admin_courses.php");
//                    }else{
//                        echo mysqli_error($con);
//                    }
//                }
                ?>

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
<?php
require 'parts/app.php';
$id = $_GET["id"];
$s = "SELECT * FROM master_registration_list WHERE id = $id";
$r = mysqli_query($con, $s);
$studentRow = mysqli_fetch_array($r);



$s = "SELECT * FROM courses_and_students WHERE student_id = $id order by id desc limit 1";
//echo $s;
$r = mysqli_query($con, $s);
if(!mysqli_num_rows($r)){
    ?>
    <div class="card mb-4 py-3 border-bottom-danger">
        <div class="card-body text-danger">
            <strong>Error! </strong> Student not found in course! Please add them in roster first!
        </div>
    </div>
<?php
    exit(); die();
}
$row = mysqli_fetch_array($r);
$roster_id = $row["roster_id"];


$s = "SELECT * FROM roster WHERE id= $roster_id";
$r = mysqli_query($con, $s);
$row = mysqli_fetch_array($r);
$course_id = $row["course_id"];

$s = "SELECT * FROM courses WHERE id = $course_id";
$r = mysqli_query($con, $s);
$courseRow = mysqli_fetch_array($r);
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Certificate";
require 'parts/head.php';
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    .graduate{
        font-family: 'Open Sans', sans-serif;
    }
</style>

<body>
    <div class="container mt-3 text-dark graduate d-flex justify-content-center align-items-center flex-column" style="height: 100vh; line-height: 45px;">
        <div class="display-4">Certificate</div>
        <div class="h3 mt-3">
            This is to certify that
        </div>
        <div class="font-weight-bold text-uppercase">
            <?php echo $studentRow["student_name"]; ?>
        </div>
        <div>
            has successfully completed
        </div>
        <div class="font-weight-bold">
            <?php echo $courseRow["course_name"]; ?>
        </div>
        <div>
            in English Proficiency
        </div>
    </div>
</body>

</html>
<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Student Registration";
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
                                <strong>Success! </strong> Student Record added Successfully!
                            </div>
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
                            <form action="" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="student_id" value="<?php echo rand(10000000, 99999999); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Registration Date</label>
                                            <input type="date" name="registration_date" class="form-control" placeholder="Registration Date" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Invoice Number:</label>
                                            <input type="text" name="invoice" class="form-control" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Student Name:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Student Name" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Passport #:</label>
                                            <input type="text" name="passport" class="form-control" placeholder="Passport Number" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" placeholder="DOB" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Phone Number</label>
                                            <input type="text" name="phone_num" class="form-control" placeholder="Phone Number" id="pwd">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Student Picture</span>
                                            </div>
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="inputGroupFile01" type="file" accept="image/*" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Select file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Date of Commencement</label>
                                            <input type="date" name="start_date" class="form-control" placeholder="Commencement Date" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="mr-3">Select Country</label>
                                            <select class="songs form-select w-100" name="country">
                                                <?php
                                                $s = "SELECT * FROM countries";
                                                $qry = mysqli_query($con, $s);
                                                while($row = mysqli_fetch_array($qry)){
                                                    ?>
                                                    <option value="<?php echo $row["country_name"]; ?>"><?php echo $row["country_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Secondary Email</label>
                                            <input type="text" class="form-control" name="email2" placeholder="Secondary Email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Guardian Contact Number:</label>
                                            <input type="text" name="gardian_contact" class="form-control" placeholder="Contact Number" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Address in South Africa:</label>
                                            <input type="text" name="SA_address" class="form-control" placeholder="Address in South Africa" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Facebook Name:</label>
                                            <input type="text" name="fb" class="form-control" placeholder="Facebook Name/ID" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Instagram Name</label>
                                            <input type="text" name="insta" class="form-control" placeholder="Instagram Name/ID" id="pwd">
                                        </div>
                                    </div>
                                </div>
<!--                                <div class="col-12">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="input-group mb-3">-->
<!--                                            <div class="input-group-prepend">-->
<!--                                                <span class="input-group-text">Upload Student Picture</span>-->
<!--                                            </div>-->
<!--                                            <div class="custom-file">-->
<!--                                                <input class="custom-file-input" id="inputGroupFile01" type="file" accept="image/*" name="image">-->
<!--                                                <label class="custom-file-label" for="inputGroupFile01">Select file</label>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-12">
                                    <div class="col-md-10 mx-auto">
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
//                        print_r($_POST); exit(); die();
                        require 'parts/db.php';
                        $registration_date = $_POST["registration_date"];
                        $start_date = $_POST["start_date"];
                        $student_id = $_POST["student_id"];
                        $name = $_POST["name"];
                        $invoice_num = $_POST["invoice"];
                        $country = $_POST["country"];
                        $passport = $_POST["passport"];
                        $dob = $_POST["dob"];
                        $phone_num = $_POST["phone_num"];
                        $gardian_contact = $_POST["gardian_contact"];
                        $SA_address = $_POST["SA_address"];
                        $fb = $_POST["fb"];
                        $insta = $_POST["insta"];
                        $email = $_POST["email"];
                        $email2 = $_POST["email2"];
                        $pic = "default.jpg";

                        if (!empty($_FILES["image"]["name"])) {
                            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
                            $path = 'img/students/'; // upload directory

                            $img = $_FILES['image']['name'];
                            $tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
                            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
                            $final_image = rand(1000, 1000000) . $img;
// check's valid format
                            if (in_array($ext, $valid_extensions)) {
                                $path = $path . strtolower($final_image);
                                if (move_uploaded_file($tmp, $path)) {
                                    $pic = $final_image;
                                }
                            } else {
                                echo 'invalid';
                                exit();
                                die();
                            }
                        }
                        $pic = strtolower($pic);
                        $sql = "INSERT INTO master_registration_list (email, email2, student_id, registration_invoice_no, registration_date, student_name, start_date,
                                      country, passport_no, dob, phone_no, guardian_contact, address_S_A, facebook, insta, pic) VALUES 
                                ('$email', '$email2', '$student_id', '$invoice_num', '$registration_date', '$name', '$start_date', '$country', '$passport',
                                 '$dob', '$phone_num', '$gardian_contact', '$SA_address', '$fb', '$insta', '$pic')";


                        if(phpRunSingleQuery($sql)){
                            js_redirect("admin_student_registration.php?success=1");
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


<!--COuntry-->
    <script src="js/select.js"></script>
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
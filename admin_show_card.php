<?php
require 'parts/app.php';
$id = $_GET["id"];
$s = "SELECT * FROM master_registration_list WHERE id=$id";
$r = mysqli_query($con, $s);
$row = mysqli_fetch_array($r);
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Student card";
require 'parts/head.php';
?>

<body>
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <!-- Card Front -->
                            <div id="CardFront">
                                <div class="row bg-appColor" style="//background-color: #bebebe;">
                                    <div class="col-md-4 mx-auto">
                                        <img src="img/logo.png" alt="" height="60px">
                                    </div>
                                    <div class="col-md-8 mx-auto d-flex flex-column justify-content-center align-items-center text-white">
                                        <p class="m-0" style="font-size: x-large;font-weight: 800;">ABC International</p>
                                        <p class="m-0" style="font-size: large;font-weight: 400;">Professional Language Learning Programme</p>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <img src="img/students/<?php echo $row["pic"]; ?>" alt="" class="w-100" style="height: 185px;">
                                    </div>
                                    <div class="col-md-7 text-dark d-flex flex-column justify-content-center align-items-center">
                                        <h3 class="font-weight-bold" style="text-align: center;"><?php echo $row["student_name"]; ?></h3>
                                        <div style="font-size: large;">
                                            <span>Date Of Birth: </span>
                                            <span><?php echo $row["dob"]; ?></span>
                                        </div>
                                        <div style="font-size: large;">
                                            <span>Passport No. : </span>
                                            <span><?php echo $row["passport_no"]; ?></span>
                                        </div>
                                        <div style="font-size: large;">
                                            <span>Student ID: </span>
                                            <span><?php echo $row["student_id"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-appColor">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-7 text-center text-white py-2" style="font-size: large">
                                        Expiry Date: <b>Dec <?php echo date("Y"); ?></b>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <!-- Card Back -->
                            <div id="CardFront">
                                <div class="row bg-appColor" style="//background-color: #bebebe;">
                                    <div class="col-md-12 py-2 d-flex flex-column justify-content-center align-items-center text-white">
                                        <p class="m-0" style="font-size: x-large;font-weight: 800;">ABC International (PTY) Ltd</p>
                                        <p class="m-0 font-weight-bold" style="font-size: large;font-weight: 400;">2018/506135/07</p>
                                    </div>
                                </div>
                                <div class="row no-gutters d-flex flex-column justify-content-center align-items-center ">
                                    <div class="col-md-12 pt-2 pb-1 text-dark">
                                        <table>
                                            <tr style="font-size: large;">
                                                <td class="text-center">Accreditation No.: </td>
                                                <td>ETDP10758</td>
                                            </tr>
                                            <tr style="font-size: large;">
                                                <td class="text-center">IEB Centre: </td>
                                                <td>9584</td>
                                            </tr>
                                            <tr style="font-size: large;">
                                                <td class="text-center">Address : </td>
                                                <td style="width: 55%;">KBW House, 122 De Korte street,
                                                    Braamfontein, Johannesburg
                                                    South Africa
                                            </td>
                                            </tr>
                                            <tr style="font-size: large;">
                                                <td class="text-center">Email Address: </td>
                                                <td>info@abcinternatonal.co.za</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="w-100 bg-appColor py-2 text-center text-white">
                                        Telephone: +27 (11) 4032171
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

</body>

</html>
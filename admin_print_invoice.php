<?php
    $id = $_GET["id"];
    require "parts/db.php";
    $sql = "SELECT * FROM payments WHERE Database_Invoice_No  =$id";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);

    $selection = array();

    if (strpos($row["userSelection"], '|') !== false) {
        $selection = explode('|', $row["userSelection"]);
    }else{
        array_push($selection, $row["userSelection"]);
    }
?>
<html>
    <head>
        <title>Invoice Details</title>
        <link href="css/sb-admin-2.min.css?v=<?php echo rand(); ?>" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/logo.jpg" alt="" style="width: 150px;">
                        </div>
                        <div class="col-md-9">
                            <b>KBW House, 122 De Korte street</b>
                            <p class="m-0">Braamfontein, Johannesburg, South Africa</p>
                            <p class="m-0">Tel: (011) 403 2171</p>
                            <p class="m-0">TE -mail: info@abcinternaonal.co.za</p>
                            <p class="m-0">www.abcinternaonal.co.za</p>
                        </div>
                    </div>
                    <div class="w-100" style="border-top: .105rem solid #5a5c69!important; height: 10px !important;">&nbsp;</div>
                </div>
                <div class="w-100 py-3">
                    <div class="clearfix">
                        <p class="float-left m-0"><span class="font-weight-bold">Date:</span> <?php echo $row["Invoice_Date"]; ?></p>
                        <p class="lead text-dark font-weight-bold float-right m-0">
                            Invoice # <span class="font-weight-normal"><?php echo $row["Database_Invoice_No"]; ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-striped text-center">
                        <tbody>

                            <tr class="w-100">
                                <td class="w-50">Name</td>
                                <td class="w-50"><?php echo in_array( "Translation" ,$selection ) ?  $row["c_name"] : $row["Customer"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Terms Of payment</td>
                                <td class="w-50"><?php echo $row["Terms_of_Payment"]; ?></td>
                            </tr>
                            <?php if($row["Terms_of_Payment"]=="eft") { ?>
                                <tr class="w-100">
                                    <td class="w-50">EFT Date</td>
                                    <td class="w-50"><?php echo $row["eft_date"]; ?></td>
                                </tr>
                                <tr class="w-100">
                                    <td class="w-50">EFT Reference</td>
                                    <td class="w-50"><?php echo $row["eft_reference"]; ?></td>
                                </tr>
                            <?php } ?>
                            <tr class="w-100">
                                <td class="w-50">ABC Receipt #</td>
                                <td class="w-50"><?php echo $row["ABC_Receipt_book"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Service Description</td>
                                <td class="w-50"><?php echo $row["ProductService_Description"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Teacher</td>
                                <td class="w-50"><?php echo $row["Teacher"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Payment Method</td>
                                <td class="w-50"><?php echo $row["Terms_of_Payment"]; ?></td>
                            </tr>
                            <?php if($row["Terms_of_Payment"]=="EFT") { ?>
                                <tr class="w-100">
                                    <td class="w-50">EFT Date/Reference</td>
                                    <td class="w-50"><?php echo $row["eft_date"].' / '.$row["eft_reference"]; ?></td>
                                </tr>
                            <?php } ?>
                            <?php if(in_array( "Books" ,$selection )) { ?>
                                <tr class="w-100">
                                    <td class="w-50">Course</td>
                                    <td class="w-50"><?php echo $row["Course"]; ?>  (R<?php echo $row["Course"]==="English Reader" ? 30 : 600 ?>)</td>
                                </tr>
                            <?php } ?>
                            <?php if(in_array( "Registration fee" ,$selection )) { ?>
                                <tr class="w-100">
                                    <td class="w-50">Registration Fee</td>
                                    <td class="w-50">R<?php echo 2000; ?></td>
                                </tr>
                            <?php } ?>
                            <?php if(in_array( "Monthly fee" ,$selection )) { ?>
                                <tr class="w-100">
                                    <td class="w-50">Monthly Fee for Month</td>
                                    <td class="w-50"><?php echo $row["mnth"]; ?> (R3000)</td>
                                </tr>
                            <?php } ?>
                            <?php if(in_array( "Exam Re-write" ,$selection )) { ?>
                                <tr class="w-100">
                                    <td class="w-50">ReWrite Fee for course</td>
                                    <td class="w-50"><?php echo $row["Course"]; ?> (R700)</td>
                                </tr>
                            <?php } ?>
                            <?php if(in_array( "Translation" ,$selection )) { ?>
                                <tr class="w-100">
                                    <td class="w-50">Translation Languages / Pages</td>
                                    <td class="w-50"><?php echo $row["lang"].' / '.$row["Tranlations_no_of_pages"]; ?> (R<?php echo $row["lang"]=="French" ? 250*$row["Tranlations_no_of_pages"] : 250*$row["Tranlations_no_of_pages"]; ?>)</td>
                                </tr>
                            <?php } ?>
                            <tr class="w-100">
                                <td class="w-50">Balance</td>
                                <td class="w-50"><?php echo $row["Balance"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Paid</td>
                                <td class="w-50"><?php echo $row["Amount"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">&nbsp</td>
                                <td class="w-50"><b>Total &nbsp;</b><?php echo $row["Amount"]+$row["Balance"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

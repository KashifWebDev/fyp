<?php
require 'parts/app.php';
$id = $_GET["id"];
$s = "SELECT * FROM master_registration_list WHERE id=$id";
$r = mysqli_query($con, $s);
$row = mysqli_fetch_array($r);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>Student Permit</TITLE>
    <META name="generator" content="BCL easyConverter SDK 5.0.252">
    <META name="title" content="StPrmt.210323-CD0203-26.March 5, 2021">
    <STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}

        #page_1 {position:relative; overflow: hidden;margin: 11px 0px 64px 65px;padding: 0px;border: none;width: 751px;}

        #page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:683px;height:110px;}
        #page_1 #p1dimg1 #p1img1 {width:683px;height:110px;}




        .dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

        .ft0{font: 33px 'Arial';color: #424242;line-height: 38px;}
        .ft1{font: 13px 'Calibri';color: #666666;line-height: 15px;}
        .ft2{font: 12px 'Calibri';line-height: 14px;}
        .ft3{font: 1px 'Calibri';line-height: 1px;}
        .ft4{font: bold 13px 'Calibri';color: #424242;line-height: 15px;}
        .ft5{font: 13px 'Calibri';color: #424242;line-height: 15px;}
        .ft6{font: bold 15px 'Calibri';text-decoration: underline;line-height: 18px;}
        .ft7{font: bold 13px 'Calibri';line-height: 15px;}
        .ft8{font: 13px 'Calibri';line-height: 15px;}
        .ft9{font: 13px 'Calibri';text-decoration: underline;line-height: 15px;}
        .ft10{font: 13px 'Arial';color: #424242;line-height: 16px;}
        .ft11{font: 13px 'Calibri';color: #424242;margin-left: 14px;line-height: 15px;}
        .ft12{font: 13px 'Calibri';color: #424242;margin-left: 14px;line-height: 16px;}
        .ft13{font: 13px 'Calibri';color: #424242;line-height: 16px;}
        .ft14{font: 15px 'Calibri';color: #424242;line-height: 18px;}
        .ft15{font: bold 13px 'Calibri';text-decoration: underline;color: #1155cc;line-height: 15px;}
        p{margin: 0px;}
        .p0{text-align: left;padding-left: 134px;margin-top: 15px;margin-bottom: 0px;}
        .p1{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p2{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p3{text-align: left;padding-left: 4px;margin-top: 10px;margin-bottom: 0px;}
        .p4{text-align: right;padding-right: 81px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p5{text-align: left;padding-left: 1px;}
        .p6{text-align: left;padding-left: 1px;margin-top: 4px;margin-bottom: 0px;}
        .p7{text-align: left;padding-left: 1px;margin-top: 10px;margin-bottom: 0px;}
        .p8{text-align: left;padding-left: 1px;margin-top: 5px;margin-bottom: 0px;}
        .p9{text-align: left;padding-left: 1px;margin-top: 3px;margin-bottom: 0px;}
        .p10{text-align: left;padding-left: 239px;margin-top: 3px;margin-bottom: 0px;}
        .p11{text-align: left;padding-left: 1px;margin-top: 13px;margin-bottom: 0px;}
        .p12{text-align: left;padding-left: 2px;margin-top: 27px;margin-bottom: 0px;}
        .p13{text-align: left;padding-left: 26px;margin-top: 22px;margin-bottom: 0px;}
        .p14{text-align: left;padding-left: 50px;padding-right: 92px;margin-top: 3px;margin-bottom: 0px;text-indent: -24px;}
        .p15{text-align: left;padding-left: 50px;padding-right: 94px;margin-top: 4px;margin-bottom: 0px;text-indent: -24px;}
        .p16{text-align: left;padding-left: 50px;padding-right: 90px;margin-top: 4px;margin-bottom: 0px;text-indent: -24px;}
        .p17{text-align: left;padding-left: 2px;margin-top: 21px;margin-bottom: 0px;}
        .p18{text-align: left;padding-left: 2px;margin-top: 22px;margin-bottom: 0px;}
        .p19{text-align: left;padding-left: 2px;margin-top: 1px;margin-bottom: 0px;}
        .p20{text-align: left;padding-left: 2px;margin-top: 3px;margin-bottom: 0px;}

        .td0{padding: 0px;margin: 0px;width: 599px;vertical-align: bottom;}
        .td1{padding: 0px;margin: 0px;width: 78px;vertical-align: bottom;}
        .td2{padding: 0px;margin: 0px;width: 233px;vertical-align: bottom;}
        .td3{padding: 0px;margin: 0px;width: 174px;vertical-align: bottom;}
        .td4{padding: 0px;margin: 0px;width: 89px;vertical-align: bottom;}
        .td5{padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;}
        .td6{padding: 0px;margin: 0px;width: 24px;vertical-align: bottom;}
        .td7{padding: 0px;margin: 0px;width: 177px;vertical-align: bottom;}
        .td8{padding: 0px;margin: 0px;width: 62px;vertical-align: bottom;}

        .tr0{height: 19px;}
        .tr1{height: 17px;}
        .tr2{height: 18px;}
        .tr3{height: 40px;}
        .tr4{height: 24px;}
        .tr5{height: 20px;}
        .tr6{height: 21px;}

        .t0{width: 677px;margin-left: 1px;margin-top: 130px;font: 13px 'Calibri';color: #666666;}
        .t1{width: 407px;margin-left: 4px;margin-top: 1px;font: bold 13px 'Calibri';}
        .t2{width: 287px;margin-left: 26px;font: 13px 'Calibri';color: #424242;}
        *{font-size: 17px !important;}
    </STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
    <DIV id="p1dimg1">
        <IMG src="img/empty_topHead.jpg" id="p1img1"></DIV>


    <DIV class="dclr"></DIV>
    <P class="p0 ft0">&nbsp;</P>
    <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
            <TD class="tr0 td0"><P class="p1 ft1">KBW House, 122 De Korte Street,</P></TD>
            <TD class="tr0 td1"><P class="p2 ft2"><?php echo date("M d, Y"); ?></P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p1 ft1">Braamfontein, Johannesburg</P></TD>
            <TD class="tr1 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p1 ft1">South Africa</P></TD>
            <TD class="tr2 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p1 ft1">Telephone: +27 11 403 2171 | 011 4032171</P></TD>
            <TD class="tr2 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p1 ft1">Email: info@abcinternational.co.za</P></TD>
            <TD class="tr2 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p1 ft1">Web: www.abcinternational.co.za</P></TD>
            <TD class="tr2 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td0"><P class="p2 ft4">To whom it may concern</P></TD>
            <TD class="tr3 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr4 td0"><P class="p2 ft5">Dear Sir or Madam,</P></TD>
            <TD class="tr4 td1"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
    </TABLE>
    <P class="p3 ft6">Study permit application for the following student</P>
    <TABLE cellpadding=0 cellspacing=0 class="t1">
        <TR>
            <TD colspan=2 class="tr5 td2"><P class="p2 ft8"><SPAN class="ft7">Student Name : </SPAN><?php echo $row["student_name"]; ?></P></TD>
            <TD class="tr5 td3"><P class="p2 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr6 td4"><P class="p2 ft7">Date of Birth :</P></TD>
            <TD class="tr6 td5"><P class="p4 ft8"><?php echo $row["dob"]; ?></P></TD>
            <TD class="tr6 td3"><P class="p2 ft7">Passport Number : <SPAN class="ft8"><?php echo $row["passport_no"]; ?></SPAN></P></TD>
        </TR>
    </TABLE>
    <P class="p5 ft8">This is to certify that the student above has been accepted to study at the above Academy</P>
    <P class="p6 ft8">and <SPAN class="ft9">has paid the required deposit to study for 12 months</SPAN> ( Invoice number: <?php echo $row["registration_invoice_no"]; ?> ).</P>
    <P class="p7 ft5">The student will complete the following courses:</P>
    <P class="p8 ft4">ENGLISH FOUNDATION COURSE (LEVEL 1 - 6)</P>
    <P class="p9 ft4">ENGLISH BASIC COURSE (LEVEL 7 - 15)</P>
    <P class="p9 ft4">ENGLISH INTERMEDIATE COURSE (LEVEL 16 - 23)</P>
    <?php
    $newDate = date("M, Y", strtotime($row["start_date"]));
    $lastMnth = date('M, Y', strtotime('+11 months', strtotime($row["start_date"])));
    ?>
    <P class="p10 ft8"><SPAN class="ft4">Duration: </SPAN><?php echo $newDate; ?>, to <?php echo $lastMnth; ?></P>
    <P class="p11 ft5">The above registration is based on the following criteria:</P>
    <TABLE cellpadding=0 cellspacing=0 class="t2">
        <TR>
            <TD class="tr6 td6"><P class="p2 ft10">●</P></TD>
            <TD class="tr6 td7"><P class="p2 ft5">Employment prohibited</P></TD>
            <TD class="tr6 td6"><P class="p2 ft10">●</P></TD>
            <TD class="tr6 td8"><P class="p2 ft5">Conduct</P></TD>
        </TR>
        <TR>
            <TD class="tr0 td6"><P class="p2 ft10">●</P></TD>
            <TD class="tr0 td7"><P class="p2 ft5">Academic performance</P></TD>
            <TD class="tr0 td6"><P class="p2 ft10">●</P></TD>
            <TD class="tr0 td8"><P class="p2 ft5">Attendance</P></TD>
        </TR>
    </TABLE>
    <P class="p12 ft4">The Registrar or Principal of the learning institution will undertake to -</P>
    <P class="p13 ft5"><SPAN class="ft5">1.</SPAN><SPAN class="ft11">Provide proof of registration as contemplated in the relevant legislations within 60 days of registration or</SPAN></P>
    <P class="p14 ft13"><SPAN class="ft5">2.</SPAN><SPAN class="ft12">In the event of failure to register by the closing date, provide the </SPAN><NOBR>Director-General</NOBR> with a notification of failure to register within 7 days of the closing date of registration;</P>
    <P class="p15 ft13"><SPAN class="ft5">3.</SPAN><SPAN class="ft12">Within 30 days of </SPAN><NOBR>de-registration,</NOBR> notify the <NOBR>Director-General</NOBR> that the applicant is no longer registered with such institution; and</P>
    <P class="p16 ft13"><SPAN class="ft5">4.</SPAN><SPAN class="ft12">Within 30 days of completion of studies, notify the </SPAN><NOBR>Director-General</NOBR> when the applicant has completed his or her studies or requires to extend such period of study.</P>
    <P class="p17 ft4">Should you have any queries, please contact the administrator or principal.</P>
    <div style="display: flex">
        <div>
            <P class="p18 ft5">Sincerely,</P>
            <P class="p17 ft14" style="font-weight: bold;">ABC International Administration Team</P>
            <!--            <P class="p19 ft4">Principal</P>-->
            <P class="p20 ft15"><A href="mailto:info@abcinternational.co.za">info@abcinternational.co.za</A></P>
        </div>
    </div>
</DIV>
</BODY>
</HTML>
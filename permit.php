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

.p0{text-align: left;padding-left: 134px;margin-top: 15px;margin-bottom: 0px;}
.p1{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p2{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p3{text-align: left;padding-left: 4px;margin-top: 26px;margin-bottom: 0px;}
.p4{text-align: right;padding-right: 81px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: left;padding-left: 1px;margin-top: 31px;margin-bottom: 0px;}
.p6{text-align: left;padding-left: 1px;margin-top: 4px;margin-bottom: 0px;}
.p7{text-align: left;padding-left: 1px;margin-top: 21px;margin-bottom: 0px;}
.p8{text-align: left;padding-left: 1px;margin-top: 20px;margin-bottom: 0px;}
.p9{text-align: left;padding-left: 1px;margin-top: 3px;margin-bottom: 0px;}
.p10{text-align: left;padding-left: 239px;margin-top: 3px;margin-bottom: 0px;}
.p11{text-align: left;padding-left: 1px;margin-top: 23px;margin-bottom: 0px;}
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

.t0{width: 677px;margin-left: 1px;margin-top: 70px;font: 13px 'Calibri';color: #666666;}
.t1{width: 407px;margin-left: 4px;margin-top: 1px;font: bold 13px 'Calibri';}
.t2{width: 287px;margin-left: 26px;font: 13px 'Calibri';color: #424242;}
*{font-size: 17px !important;}

</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
<DIV id="p1dimg1">
<IMG src="data:image/png;base64,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" id="p1img1"></DIV>


<DIV class="dclr"></DIV>
<P class="p0 ft0">ABC International - South Africa</P>
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
    <div style="display: flex; position: relative; height: 145px;">
        <div>
            <P class="p18 ft5">Sincerely,</P>
            <P class="p17 ft14" style="font-weight: bold;">ABC International Administration Team</P>
<!--            <P class="p19 ft4">Principal</P>-->
            <P class="p20 ft15"><A href="mailto:info@abcinternational.co.za">info@abcinternational.co.za</A></P>
        </div>
        <div>
            <img style="height: 149px;position: absolute;left: 280px;top: -3px;" src="img/stamp.png" alt="">
        </div>
<!--        <img style="height: 72px; position: absolute; margin-top: 89px; margin-left: -40px;" src="img/sign.png" alt="">-->
    </div>
</DIV>
</BODY>
</HTML>

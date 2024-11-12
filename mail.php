<?php
$to = "kmalik748@gmail.com";
$subject = "Student Permit Letter";
$txt = "Please <a href='#'>CLICK HERE</a> to get your permit letter.";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();


if(mail($to,$subject,$txt,$headers)){
    echo "yes";
}else{
    echo "============= MAIL WAS NOT SENT =============";
    exit(); die();
}
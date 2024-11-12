<?php
$subject = "ABC International 2021 Graduation Ceremony and Celebration";

$txt = "
Dear Student<br><br>

It is with great pleasure to invite you to ABC International 2021 Graduation Ceremony and Celebration. <br>
Date: Wednesday the 15th of December 2021<br>
Time: 8:30am – 3pm<br>
Address: 122 De Korte Street Braamfontein<br><br>

Lunch will be served along the bus route.<br><br> 

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
ABC International";


//    echo $txt; exit(); die();

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();


require_once "parts/db.php";
$sql = "SELECT * FROM master_registration_list WHERE id>380";
$res = mysqli_query($con, $sql);
$sent = 0;
$errors = 0;
while($row = mysqli_fetch_array($res)){
    $email = $row["email"];
    if(mail($email,$subject,$txt,$headers)){
        $sent++;
    }else{
        $errors++;
    }
}
echo "SENT: $sent<br>";
echo "Errors: $errors<br>";


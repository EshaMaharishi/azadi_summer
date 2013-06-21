<?php
//if(isset($_POST['uni'][0])){
//$to = $_POST['uni'][0] . "@columbia.edu";
$to = "dec.punk@gmail.oom";
$website_name = "Azadi";
$subject = "Welcome to " . $website_name . "!";
$message = "Thank you for verifying your right to access " . $website_name
 . " as a Columbia Student!
\nYou can proceed on the website by entering this passcode into the passcode box on the Azadi verification page:\n\nPasscode: " . $_POST['uni'][1];
$from = "azadi@gmail.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "mail sent";
//}
?>
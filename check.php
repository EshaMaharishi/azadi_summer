<?php

$str1 = $_POST['passcode'][0];
$str2 = $_POST['passcode'][1];

if($str1 == $str2)
{
/* Redirect browser */
header("Location: azadi.php");
/* Make sure that code below does not get executed when we redirect. */
exit;
}


?>
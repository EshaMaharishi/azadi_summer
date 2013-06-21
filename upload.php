<html>


<head>




<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{

$linkid = mysqli_connect ("localhost", "root", NULL, "columbia") or die (mysql_error());

echo "connects<br/>";

$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query = "INSERT INTO upload (textbook_file_name, textbook_file_size, textbook_file_type, textbook_file_content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysqli_query($linkid, $query) or die("Error: ".mysqli_error($linkid));


echo "<br>File $fileName uploaded<br>";
} 
?>

</head>


<body>


	<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="20000000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
	</form>



</body>

</html>
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

$linkid = mysqli_connect ("localhost", "root", NULL, "columbia") or die (mysql_error());

$query = "SELECT textbook_file_id, textbook_file_name FROM upload";
$result = mysqli_query($linkid, $query) or die("Error: ".mysqli_error($linkid));

echo "numrows: ".mysqli_num_rows($result);
if(mysqli_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysqli_fetch_array($result))
{
?>
<a href="download.php?id=<?php echo urlencode($id);?>"><?php echo urlencode($name);?></a> <br>
<?php 
}
}
?>

<?php
if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database

$id    = $_GET['id'];
$query = "SELECT textbook_file_name, textbook_file_type, textbook_file_size, textbook_file_content " .
         "FROM upload WHERE textbook_file_id = '$id'";

$result = mysqli_query($linkid, $query) or die("Error: ".mysqli_error($linkid));
list($name, $type, $size, $content) =  mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");

ob_clean();
flush();

echo $content;

exit;
}

?>
</body>
</html>
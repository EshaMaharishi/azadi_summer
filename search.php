<?php
	$linkid = mysqli_connect ("localhost", "root", NULL, "columbia") or die (mysql_error());
	
	$term = $_POST['term'];
	
	$query = "SELECT * FROM `table 2` WHERE `callnumber` LIKE '%$term%' LIMIT 0, 30 ";
	
	if($result = mysqli_query($linkid, $query) or die("Error: ".mysqli_error($linkid)))
	{
		echo "<div class='helptext'>";
		echo "Click a class to expand and view textbook PDF files.";
		echo "<br/>Click here to ";
		echo "<span class='showall'>";
		echo "<u>show all results</u>.";
		echo "</span>";	
		echo "</div>";				
		while($row = mysqli_fetch_array($result)){
			echo "<div class='result'>";
			echo "<b>Class title:</b> ";
			echo "<br/><br/>";
			echo "<div class='file'>";
			echo "<b>Class information: </b>";
			echo "<br/>Call number: ";
			echo nl2br($row['callnumber']);
			echo "<br/>Professor: ";
			echo "<br/><br/><b>Available PDF files: </b><br/><br/>";

			echo "<b>Upload a PDF file yourself here:</b><br/><br/>";
			echo '<form method="post" enctype="multipart/form-data">
					<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
					<tr> 
					<td width="246">
					<input type="hidden" name="MAX_FILE_SIZE" value="20000000000">
					<input name="userfile" type="file" id="userfile"> 
					</td>
					<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
					</tr>
					</table>
					<input type="hidden" name="callnum" value="'. nl2br($row['callnumber']) . '"/>
					</form>';
			
			echo "</div>";
			echo "</div>";
		}
	}
	
?>
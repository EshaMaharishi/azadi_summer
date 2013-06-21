 
<!DOCTYPE html>
<html lang="en">
<head>

	<?php
	session_start();
	$_SESSION['allowable'] = 0;
	?>

	<link rel="shortcut icon" href="images/favicon.ico" >
    <meta name="keywords" content="jQuery Panel Widget, Panel, jqxPanel, jQuery Widgets, jQuery Plugins, jQuery UI Widgets, jQuery UI" /> 
	<link href='http://fonts.googleapis.com/css?family=Lekton|Magra:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="/lib/js/jquery-latest.js"></script>
	<script type="text/javascript" src="/lib/js/jquery-ui-latest.js"></script>
	<script type="text/javascript" src="/lib/js/jquery.layout-latest.js"></script>
    <title id='Description'>Azadi: a free textbook pdf sharing website</title>
	
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    
	
	<script type="text/javascript" src="jquery-version.js"></script>
	<script type="text/javascript" src="ajaxform.js"></script>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,200,300,700,700italic' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="script/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="jScrollPane.js"></script>

    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
            // Create jqxPanel
            $("#jqxpanel").jqxPanel({ width: 550, height: 600});
			
	//prevent submit button from showing in form
    $('form').each(function() {
        $('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });
        $('input[type=submit]').hide();
    });
	
	$("#ajaxquery").live( "submit" , function(){
    // Intercept the form submission
    var formdata = $(this).serialize(); // Serialize all form data

    // Post data to your PHP processing script
    $.post( "search.php", formdata, function( data ) {
        // Act upon the data returned, setting it to #success <div>
		$("#allresults").html ( data );
		$("#allresults").slideDown();
    });

    return false; // Prevent the form from actually submitting
	});
			
	$("#allresults").on('mouseenter', '.result', function(){
		$(this).css("background-color", "darkgray");
	});
	
	$("#allresults").on('mouseleave', '.result', function(){
		$(this).css("background-color", "lightgray");
	});
	
	$("#allresults").on('click', '.result', function(){
		$(this).removeClass("result");
		$(this).addClass("chosenResult");
	//	$('.result').css("display","none");
		$('.result').slideUp();
		$(this).find(".file").slideDown();
	});
	
	$("#allresults").on('click', '.showall', function(){
		$('.chosenResult').addClass("result");
		$('.chosenResult').removeClass("chosenResult");
		$('.file').slideUp();
		$('.result').css("background-color", "lightgray");
		$('.result').slideDown();
	});
});
    </script>
	
<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{

$linkid = mysqli_connect ("localhost", "root", NULL, "columbia") or die (mysql_error());

$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$term = $_POST['callnum'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query = "UPDATE	`table 2` 
		 SET		textbook_file_name='$fileName', textbook_file_size='$fileSize', textbook_file_type='$fileType', textbook_file_content='$content'
		 WHERE		callnumber=\'" . $term . "\'";


mysqli_query($linkid, $query) or die("Error: ".mysqli_error($linkid));

echo "finished";

} 
?>
</head>


<body>

	<div id="container">
	
		<div id="search">
			<font style="text-align: center;"><h1>Azadi</h1>
			<div class="definition"><p>def. freedom</p></div></font>
			
			<br/><br/><br/>
			<div style="align: center;">
				<form action="" method="POST" id="ajaxquery" class="classSelector">
					<input type='text' value="Enter a course call number" name='term' /> <br />
					<input type="submit" name="submit" value="Submit" />
				</form>
			</div>
		</div>

		

    <div id="results">
	
        <div style='margin: 10px;'></div>
		
			<!--Content-->
			<div style='white-space: nowrap;'>
				<div id="allresults">
	
				</div>
			</div>
		
    </div>
	
	</div>
	
	
</body>
</html>

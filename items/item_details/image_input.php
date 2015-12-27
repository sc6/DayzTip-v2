<?php
//This file is meant to be an 'include'.
//	Provides the client with a comment submission form.

//Warnings:
//	Client must be logged in.
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$username				(client's username)
//	$level					(client's level)
//	$_SESSION['item']		(client's last visited item page)
//	submit_multiplier.php	(include beforehand)

//Outputs:
//	Adjusts image to horizontal or vertical fill.

if(!isset($_POST['flip'])) { //only display title when NOT submitted ?>
	<br />
	<span class="subsubtitle">Edit: Image, Optimization</span>
	<div class="small_break"></div>
<?php }

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	echo "Connection failed to database. <br /><br />";
}

if(isset($_POST['flip']) && $username==='cid') {	//after button has been pressed
	
	$query = "UPDATE item_info SET image_alt = '".$_POST['flip']."' WHERE item_raw = '".$_SESSION['item']."';";
	mysqli_query($link, $query);
	
}



else { 	//the following will be shown initially... (a submit form)
?>
	
	
	<div class="small_break"></div>
	<form method="POST" action="">
		<textarea name="flip" class="fancy" required="required" maxlength="150">true</textarea><br /><br />
		<input type="submit" value="Flip" />
	</form>

<?php } ?>


<div class="small_break"></div>
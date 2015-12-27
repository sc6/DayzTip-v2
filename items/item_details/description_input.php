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
//	Writes client's item description to database
//	Gives the gold reward
//	Reports for possible injection attempts


if(!isset($_POST['description'])) { //only display title when NOT submitted ?>
	<br />
	<span class="subsubtitle">Edit: Official Description</span>
	<div class="small_break"></div>
<?php }

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	echo "Connection failed to database. <br /><br />";
}

if(isset($_POST['description']) && $username==='cid') {	//after the client submits the form with their comment...
	
	$raw_comment = $_POST['description'];
	$sanitized_comment = htmlspecialchars($raw_comment);
	$sanitized_comment = mysqli_real_escape_string ($link, $sanitized_comment);

		if((strcmp($raw_comment, $sanitized_comment) !== 0)) {	//reports possible injections
			$report_description = "This comment has been flagged for injection. START: ".$sanitized_comment." :END";
			$query = "INSERT INTO reports (username, description, thanks, link) VALUES ('".$username."', '".$report_description."', 'comment_flag_bot', '".$item."')";
			mysqli_query($link, $query);
			}
	
	
	
	//writes the sanitized comment
	$query = "UPDATE item_info SET item_description='".$sanitized_comment."' WHERE item_raw='".$_SESSION['item']."'";
	mysqli_query($link, $query);
	
	//gives the gold
	$query = "UPDATE user_stats SET gold = gold + ".$description_reward." WHERE username='".$username."'";
	mysqli_query($link, $query);
	
	}



else { 	//the following will be shown initially... (a submit form)
?>
	
		<strong>Please read:</strong>
		<br /><br />
		• <strong>You</strong> will be rewarded <strong><?php echo $description_reward ?> gold</strong> for a correct submission.
		<br />
		• Use this section to write in verbatim (word for word) the in-game description of the item.
		<br />
		• Any incorrect submission will be removed.
	
	<div class="small_break"></div>
	<form method="POST" action="">
		<textarea name="description" class="fancy" maxlength="1000" required="required"></textarea><br /><br />
		<input type="submit" value="Submit description (+<?php echo $description_reward ?> gold)" />
	</form>

<?php } ?>


<div class="small_break"></div>
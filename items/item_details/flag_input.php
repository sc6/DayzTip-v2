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
//	Writes client's flag tip to database
//	Gives the gold reward
//	Reports for possible injection attempts


if(!isset($_POST['flag'])) { //only display title when NOT submitted ?>
	<br />
	<span class="subsubtitle">Edit: Warnings</span>
	<div class="small_break"></div>
<?php }

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	echo "Connection failed to database. <br /><br />";
}

if(isset($_POST['flag'])) {	//after the client submits the form with their comment...
	
	$raw_comment = $_POST['flag'];
	$sanitized_comment = htmlspecialchars($raw_comment);
	$sanitized_comment = mysqli_real_escape_string ($link, $sanitized_comment);

		if((strcmp($raw_comment, $sanitized_comment) !== 0)) {	//reports possible injections
			$report_description = "This comment has been flagged for injection. START: ".$sanitized_comment." :END";
			$query = "INSERT INTO reports (username, description, thanks, link) VALUES ('".$username."', '".$report_description."', 'comment_flag_bot', '".$item."')";
			mysqli_query($link, $query);
			}
	
	//writes the sanitized comment
	$query = "INSERT INTO comments (comment, item, username, type) VALUES ('".$sanitized_comment."', '".$_SESSION['item']."', '".$username."', 'flag')";
	mysqli_query($link, $query);
	
	//gives the gold
	$query = "UPDATE user_stats SET gold = gold + ".$flag_reward." WHERE username='".$username."'";
	mysqli_query($link, $query);
	
	}



else { 	//the following will be shown initially... (a submit form)
?>
	
		<strong>Please read:</strong>
		<br /><br />
		• <strong>You</strong> will be rewarded <strong><?php echo $flag_reward ?> gold</strong> for each correct submission.
		<br />
		• Use this section to explain any dangers that may come with this item.
		<br />
		• Any incorrect submissions will be removed.
		<br />
		• Limit submissions to one, <strong>brief</strong> sentence.
	
	<div class="small_break"></div>
	<form method="POST" action="">
		<textarea name="flag" class="fancy" maxlength="150" required="required"></textarea><br /><br />
		<input type="submit" value="Submit tip (+<?php echo $flag_reward ?> gold)" />
	</form>

<?php } ?>


<div class="small_break"></div>
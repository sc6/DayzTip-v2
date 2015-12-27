<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>User Submission Page - DayZTip</title>

    <link href="../../styles/styles.css" rel="stylesheet" type="text/css" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="../../styles/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../styles/favicon.ico" type="image/x-icon">
</head>



<body>

<!--Header-->
<?php
include("../../accounts/views/title.php");
?>


<!--Account-->
<div class="account_box">
<div class="content_wrapper">
	<div class="account_info">
		<?php
		// checking for minimum PHP version
		if (version_compare(PHP_VERSION, '5.3.7', '<')) {
			exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
		} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
			// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
			// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
			require_once("../../accounts/libraries/password_compatibility_library.php");
		}

		// include the configs / constants for the database connection
		require_once("../../accounts/config/db.php");

		// load the login class
		require_once("../../accounts/classes/Login.php");

		// create a login object. when this object is created, it will do all login/logout stuff automatically
		// so this single line handles the entire login process. in consequence, you can simply ...
		$login = new Login();

		// ... ask if we are logged in here:
		if ($login->isUserLoggedIn() == true) {
			// the user is logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are logged in" view.
			include("../../accounts/views/logged_in.php");

		} else {
			// the user is not logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are not logged in" view.
			echo '<a href="../../accounts/">Sign in</a> to earn rewards!';
		}
		?>
	</div>
</div>
</div>

<!--"Good stuff"-->
<?php include("../../accounts/views/good_stuff.php"); ?>
<!--END "Good stuff"-->

<div class="small_break"></div>


<!--Title-->
<?php
if($login->isUserLoggedIn() == true) {
	include("../../accounts/views/db_connect.php");
	include("submit_multiplier.php"); //included for account reward values 
	}

//This gets the item's formal name from db
$query = "SELECT * FROM `item_info` WHERE item_raw='".$_SESSION['item']."'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$item_formal_name = $row['item_name'];
?>

<div class="title_bar">
	<div class="content_wrapper">
		<!--<div class="edit_button"><span id="subtle">[Edit]</span></div>-->
		<span class="subtitle"><?php echo $item_formal_name ?> (Submission Page)</span>
	</div>
	<br /><br />
</div>
<!--END Title-->

<div class="content_wrapper">

<!-- Inputs -->
<?php if($login->isUserLoggedIn() == false) { //checks if user is logged in ?>
	<br /><br />
	You're not supposed to be here... 
	<br /><br />
	<a href='../../accounts/'>Sign in</a> is required on this page.

<?php } 

elseif(
isset($_POST['flip']) || 
isset($_POST['flag']) ||
isset($_POST['description']) || 
isset($_POST['options']) ||
isset($_POST['dialogue']) || 
isset($_POST['condition']) ||  
isset($_POST['HTG']) || 
isset($_POST['uses']) || 
isset($_POST['comment'])
	) { ?>

	<br /><br />
	Your submission was successful. Your account has been successfully credited.
	<br /><br />
	<a href="../../item/?id=<?php echo $_SESSION['id'] ?>">(Return to item page)</a>
	
		<?php
		if(isset($_POST['flip'])) include("image_input.php");
		if(isset($_POST['flag'])) include("flag_input.php");
		if(isset($_POST['description'])) include("description_input.php");
		if(isset($_POST['options'])) include("options_input.php");
		if(isset($_POST['dialogue'])) include("dialogue_input.php");
		if(isset($_POST['condition'])) include("conditions_input.php");
		if(isset($_POST['HTG'])) include("HTG_input.php"); 		//This posts the user submission to page
		if(isset($_POST['uses'])) include("uses_input.php");	//after displaying submission message.
		if(isset($_POST['comment'])) include("comment_input.php");
	

	
} else {

if($_GET['action'] === 'edit_image') include("image_input.php");
if($_GET['action'] === 'edit_warnings') include("flag_input.php");
if($_GET['action'] === 'edit_description') include("description_input.php");
if($_GET['action'] === 'edit_options') include("options_input.php");
if($_GET['action'] === 'edit_dialogue') include("dialogue_input.php");
if($_GET['action'] === 'edit_conditions') include("conditions_input.php");
if($_GET['action'] === 'edit_HTG') include("HTG_input.php");	//Todo: include $_GET if's
if($_GET['action'] === 'edit_uses') include("uses_input.php");
if($_GET['action'] === 'submit_comment') include("comment_input.php");

	
echo '
<a href="../../item/?id='.$_SESSION['id'].'">(Return to item page)</a>
';
	
}

?>
<!--END-->

<div class="break"></div>
</div>
</body>
</html>

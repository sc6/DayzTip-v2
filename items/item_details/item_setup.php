<!DOCTYPE>


<head>
	<meta name="robots" content="noindex">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Database Administration - DayZTip</title>

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
<!--END Account-->


<!--"Good stuff"-->
<?php include("../../accounts/views/good_stuff.php"); ?>
<!--END "Good stuff"-->


<br /><br />
<div class="content_wrapper">


<!--admin only, enter into item_info database-->

<?php

if(isset($_POST['item_raw']) && isset($_POST['item_formal']) && $_SESSION['user_name'] === 'cid'):
	
	//connect to db
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed to database. <br /><br />";
	}
	
	$query = "INSERT INTO item_info (item_raw, item_name, item_image, category, subcategory) VALUES ('".$_POST['item_raw']."', '".$_POST['item_formal']."', '".$_POST['item_raw']."', '".$_POST['category']."', '".$_POST['subcategory']."')";
	mysqli_query($link, $query);
	
	echo 'Submission was successful. Entry '.$item_formal.' was added.';

endif;	

if($_SESSION['user_name'] === 'cid'):?>
	
	<form method="POST" action="">
		item_raw: <textarea name="item_raw" class="fancy" required="required" maxlength="150"></textarea><br /><br />
		item_formal: <textarea name="item_formal" class="fancy" required="required" maxlength="150"></textarea><br /><br />
		category: <textarea name = "category" class="fancy" required="required" maxlength="100"></textarea><br /><br />
		subcategory: <textarea name = "subcategory" class="fancy" required="required" maxlength="100"></textarea><br /><br />
		<input type="submit" value="Enter into database" />
	</form>
	
<?php
else:
?>
Only moderators and admins can access this page to enter new items into our database.
<br /><br />
<a href="#">Apply to become a moderator</a>

<?php
endif;
?>

<?php include('../../accounts/views/footer.php') ?>

</div>
</body>
</html>
</html>
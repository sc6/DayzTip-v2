<!DOCTYPE>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Item Search (Index) - DayZTip</title>

    <link href="../styles/styles.css" rel="stylesheet" type="text/css" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="../styles/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../styles/favicon.ico" type="image/x-icon">
</head>



<body>


<!--Header-->
<?php
include("../accounts/views/title.php");
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
			require_once("../accounts/libraries/password_compatibility_library.php");
		}

		// include the configs / constants for the database connection
		require_once("../accounts/config/db.php");

		// load the login class
		require_once("../accounts/classes/Login.php");

		// create a login object. when this object is created, it will do all login/logout stuff automatically
		// so this single line handles the entire login process. in consequence, you can simply ...
		$login = new Login();

		// ... ask if we are logged in here:
		if ($login->isUserLoggedIn() == true) {
			// the user is logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are logged in" view.
			include("../accounts/views/logged_in.php");

		} else {
			// the user is not logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are not logged in" view.
			echo '<a href="../accounts/">Sign in</a> to earn rewards!';
		}
		?>
	</div>
</div>
</div>
<!--END Account-->


<!--"Good stuff"-->
<?php include("../accounts/views/good_stuff.php"); ?>
<!--END "Good stuff"-->


<br /><br />



<!--Title-->
<?php
$address = "items/";
$_SESSION['address'] = $address;
include('../accounts/views/db_connect.php');
?>


<div class="content_wrapper">

<!--Search-->	
	<div class="content_box">
		<span class="subtitle">Search Items</span>
		<br /><br />
		<?php if(isset($_POST['search'])):	//Search algorithm
			include('item_details/search.php'); 
		
		else: //Search form/bar	?>
			<form method="POST" action="">
				<input type="search" name="search" class="search_main" required="required" placeholder="Search database..."></input>
				&nbsp;&nbsp;<input type="submit" id="big" value="Search" />
			</form>
	</div>


<!--Collections-->
	<div class="content_box">
		<span class="subtitle">Browse by collection</span>
		<br /><br />
		<a href="collections/consumables.php">Consumables</a> <span id="subtle">(100%)</span><br />
		<a href="collections/head_equipment.php">Head Equipment</a> <span id="subtle">(100%)</span><br />
		<a href="collections/body_equipment.php">Body Equipment</a> <span id="subtle">(100%)</span><br />
	</div>

<div class="small_break"></div>


<?php endif;
include('../accounts/views/footer.php') ?>

</div>
</body>
</html>
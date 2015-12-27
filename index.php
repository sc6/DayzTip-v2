<!DOCTYPE>


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="DayZHelp is your one-stop place for DayZ help, tips, and guides.">

    <title>DayZTip - Your one-stop place for DayZ Standalone tips, help, and guides</title>

    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="styles/favicon.ico" type="image/x-icon">
    <link rel="icon" href="styles/favicon.ico" type="image/x-icon">

</head>


<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("accounts/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("accounts/config/db.php");

// load the login class
require_once("accounts/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
?>




<body>

<!--Title-->
<?php
include("accounts/views/title.php");
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
			require_once("accounts/libraries/password_compatibility_library.php");
		}

		// include the configs / constants for the database connection
		require_once("accounts/config/db.php");

		// load the login class
		require_once("accounts/classes/Login.php");

		// create a login object. when this object is created, it will do all login/logout stuff automatically
		// so this single line handles the entire login process. in consequence, you can simply ...
		$login = new Login();

		// ... ask if we are logged in here:
		if ($login->isUserLoggedIn() == true) {
			// the user is logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are logged in" view.
			include("accounts/views/logged_in.php");

		} else {
			// the user is not logged in. you can do whatever you want here.
			// for demonstration purposes, we simply show the "you are not logged in" view.
			echo '<a href="accounts/">Sign in</a> to earn rewards!';
		}
		?>
	</div>
</div>
</div>
<!--END Account-->

<?php
include('accounts/views/db_connect.php');
?>

<div class="content_wrapper">
<div class="small_break"></div>


<!--Announcement-->
	<div class="content_box">
		This website is still in development, but there's still a ton of content for you to <a href="items">check out!</a>
	</div>
	
	
<!--DayZ & Site news-->	
	<div class="content_box">
		<span class="subtitle">DayZ News</span>
		<br /><br />
		
		<?php if($_SESSION['user_name'] === 'cid' && isset($_POST['dayznews'])):
			//submit new entry to dayZ news
			$query = "INSERT INTO dayznews (news) VALUES ('".$_POST['dayznews']."')";
			$result = mysqli_query($link, $query); ?>
			DayZ News has been updated.
			<div class="small_break"></div>
			
		<?php elseif($_SESSION['user_name'] === 'cid'):
			//display news input for CID only. ?>
			<form method="POST" action="">
			<textarea name="dayznews" class="fancy" required="required" maxlength="250"></textarea><br /><br />
			<input type="submit" value="Submit DayZ News" />
			</form>
			<div class="small_break"></div>
			
		<?php endif;

		$query = "SELECT * FROM dayznews ORDER BY id DESC";
		$result = mysqli_query($link, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<span id="subtle">'.$row['time'].' PST</span> '.$row['news'];
			echo '<br />';
		}
		?>
	
	<div class="small_break"></div>	

		<span class="subtitle">Site News</span>
		<br /><br />
		<?php if($_SESSION['user_name'] === 'cid' && isset($_POST['sitenews'])):
			//submit new entry to dayZ news
			$query = "INSERT INTO changelog (changelog) VALUES ('".$_POST['sitenews']."')";
			$result = mysqli_query($link, $query); ?>
			Site News has been updated.
			<div class="small_break"></div>
			
		<?php elseif($_SESSION['user_name'] === 'cid'):
			//display news input for CID only. ?>
			<form method="POST" action="">
			<textarea name="sitenews" class="fancy" required="required" maxlength="250"></textarea><br /><br />
			<input type="submit" value="Submit Site News" />
			</form>
			<div class="small_break"></div>
			
		<?php endif;
		
		$query = "SELECT * FROM changelog ORDER BY id DESC";
		$result = mysqli_query($link, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<span id="subtle">'.$row['time'].' PST</span> '.$row['changelog'];
			echo '<br />';
		}
		?>
	</div>
	
	
<!--My Account-->
	<div class="content_box">
		<span class="subtitle">My Account</span>
		<br /><br />
		<?php if($login->isUserLoggedIn() == true): ?>
		Thanks for joining! I haven't gotten around to finishing this section of the website yet, but
		expect change here soon.
		
		<?php else: ?>
		You must <a href="accounts">log in</a> to view this section!
		
		<?php endif; ?>
	</div>
	
<div class="small_break"></div>

<?php include('accounts/views/footer.php');?>

</div>
</body>
</html>

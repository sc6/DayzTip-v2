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



<body>



<!--Title-->
<?php
include("accounts/views/title.php");
?>



<!--Account
<div class="content_box">
?php
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
    echo '<a href="./accounts/">Sign in</a> to earn rewards!';
}
?>
</div>


<!--Index Content 1--
<div class="content_box">
This website is currently in development. Come back soon!<br /><br />

In the meantime, check out <a href="/items/alkaline_battery_9v.php">this sample page</a>.
</div>
-->

<h1 class="welcome">
	Welcome.
</h1>

<h2 class="welcome">
	Join us to start helping explore the great world of Chernarus. 
	Together, we will rebuild society, one step at a time.
</h2>


</div>
</body>
</html>

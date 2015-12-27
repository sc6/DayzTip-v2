<!DOCTYPE>


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="DayZHelp is your one-stop place for DayZ help, tips, and guides.">

    <title>Account Log In - DayzTip</title>

    <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="../assets/styles/paragraphsSet.css" rel="stylesheet" type="text/css" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

</head>


<body>


<!--Title-->
<?php
include("views/title.php");
?>


<div class="content_wrapper">


<!--Login form-->
<div class="content_box">

<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
			echo '<br /><br />';
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
			echo '<br /><br />';
        }
    }
}
?>

<form method="post" action="index.php" name="loginform">
    <label for="login_input_username">Username</label><br />
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
	<br /><br /><br />
	
    <label for="login_input_password">Password</label><br />
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
	<br />
	
    <input class="login" type="submit"  name="login" value="[Log in]" />
</form>
</div>


<!--Go to registration form-->
<div class="content_box">
<a href="register.php">Register new account</a>
</div>

</div>
</body>


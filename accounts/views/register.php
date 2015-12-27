<!DOCTYPE>

<!-- html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> -->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="DayZHelp is your one-stop place for DayZ help, tips, and guides.">

    <title>Account Registration - DayzTip</title>

    <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="../assets/styles/paragraphsSet.css" rel="stylesheet" type="text/css" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

</head>


<body>

<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>


<!--Title-->
<?php
include("views/title.php");
?>

<div class="content_wrapper">


<!--Register Form-->
<div class="content_box">
<form method="post" action="register.php" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username">Username </label>
	<br />
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
	<span><em>(only letters and numbers, 2 to 64 characters)</em></span>
	<br /><br /><br />

    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">Email </label>
	<br />
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
	<br /><br /><br />
	
    <label for="login_input_password_new">Password </label>
	<br />
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
	<span><em>(min. 6 characters)</em></span>
	<br /><br /><br />
	
    <label for="login_input_password_repeat">Repeat password</label>
	<br />
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <br />
	
	<input class="login" type="submit"  name="register" value="[Register]" />

</form>
</div>


<!-- Return Link -->
<div class="content_box">
<a href="index.php">Back to Login Page</a>
</div>


</div>
</body>
</html>

<?php
//**DEPRECATED** -- instead use LOGGED_IN.php included in ACCOUNT_VIEW.php!!

//This file is meant to be an 'include'.
//	Please make sure client is logged in before including this code.

//Inputs:
//	DB_HOST					(database credentials)
//	DB_USER
//	DB_PASS
// 	DB_NAME
//	$_SESSION['username']	(client's username stored in SESSION variable)	

//Outputs:
//	$username				(client's username)
//	$level					(client's level)
//	$gold					(client's gold)
//	$usergroup				(client's group)


$username = $_SESSION['user_name'];

$query = "SELECT * FROM user_stats WHERE username='".$username."'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$level = $row['level'];
$gold = $row['gold'];
$usergroup = $row['group'];

?>
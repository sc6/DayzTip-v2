<!-- if you need user information, just put them into the $_SESSION variable and output them here -->

<?php
echo 'Hey, <strong>'.$_SESSION['user_name'].'</strong>';
	
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (!$link) {
		die('Error: Connection to database has failed.');
	}
	
	$query = "SELECT * FROM user_stats WHERE username='".$_SESSION['user_name']."'";
	$result = mysqli_query($link, $query);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$username = $_SESSION['user_name'];
	$gold = $row['gold'];
	$level = $row['level'];
	$usergroup = $row['group'];
	
	echo ' ('.$level.'). You have '.$gold.' gold. You are a '.$usergroup.'.';
?>


<!--logout button-->
<?php if($logout_disable == false): ?>
	<a href="?logout">(Logout)</a>
	
<?php else: ?>
	<span id="subtle">(Logout is disabled on this page for security)</span>
	
<?php endif; ?>

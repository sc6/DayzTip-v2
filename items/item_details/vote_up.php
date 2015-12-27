<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="robots" content="noindex">
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Comment Administration (Give Points) - DayZTip</title>

    <link href="../../styles/styles.css" rel="stylesheet" type="text/css" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
    <link rel="shortcut icon" href="../../styles/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../styles/favicon.ico" type="image/x-icon">

</head>



<body>

<!--Title-->
<?php
include("../../accounts/views/title.php");
?>


<!--Account-->
<div class="account_box">
<div class="content_wrapper">
	<div class="account_info">
		<?php
		$logout_disable = true; //disable logout on this page
		
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
		
		$logout_disable = false; //re-enable logout button
		?>
	</div>
</div>
</div>
<!--END Account-->


<!--"Good stuff"-->
<?php include("../../accounts/views/good_stuff.php"); ?>
<!--END "Good stuff"-->



<!--Title-->
<br /><br />
<div class="title_bar">
	<div class="content_wrapper">
		<span class="subtitle">Comment Administration (Give Points)</span>
	</div>
	<br /><br />
</div>

<div class="content_wrapper">


<?php include("submit_multiplier.php"); ?>
<?php include("../../accounts/views/db_connect.php"); ?>
<?php include("../../accounts/views/user_info.php"); ?>



<!-- Comment Review -->

<?php if ($login->isUserLoggedIn() == false): //checks if user is logged in & has access, full stop ?> 
	<span>You must <a href="../../accounts/">sign in</a> to give points.</span>

<?php else: //user is logged in, operate normally ?>
<span class="subsubtitle">Give action to the following:</span>
<div class="small_break"></div>
<div class="comment_box">

	
<?php //displays comment preview
$query = "SELECT * FROM `comments` WHERE id=".$_GET[comment_id];
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$comment_author = $row['username'];
$comment = $row['comment'];
$comment_points = $row['points'];
$comment_id = $row['id'];


$query_2 = "SELECT * FROM `user_stats` WHERE username='".$comment_author."'";
$result_2 = mysqli_query($link, $query_2);
$row_2 = mysqli_fetch_array($result_2, MYSQLI_ASSOC);
	
$comment_author_level = $row_2['level'];

	
echo 
'<strong>' . $comment_author . '</strong> (' . $comment_author_level . ') - '.$comment_points.' points: <span id="subtle">(id: '.$comment_id.')</span><br />
<pre class="comment">'.$comment.'</pre><br />';
?>

</div>
<div class="small_break"></div>




<!-- Vote up function -->
<?php if(isset($_POST['quantity_points']) && $gold >= $_POST['quantity_points']): //submitted form & has enough to pay
	//this section deducts gold from payer and give points to comment/author
	
	//deducts gold for each point they give
	$query_3 = "UPDATE user_stats SET gold = gold - ".$_POST['quantity_points']." WHERE username='".$_SESSION['user_name']."'";
	$result_3 = mysqli_query($link, $query_3);
	$row_3 = mysqli_fetch_array($result_3, MYSQLI_ASSOC); 
	
	//gives points for each points given
	$query_4 = "UPDATE comments SET points = points + ".$_POST['quantity_points']." WHERE id=".$_GET['comment_id'];
	$result_4 = mysqli_query($link, $query_4);
	$row_4 = mysqli_fetch_array($result_4, MYSQLI_ASSOC);
	
	//gives gold to author for each points given
	$query_5 = "UPDATE user_stats SET gold = gold + ".$_POST['quantity_points']."WHERE username='".$comment_author."'";
	$result_5 = mysqli_query($link, $query_5);
	$row_5 = mysqli_fetch_array($result_5, MYSQLI_ASSOC);
	

	?>
	
	<span>You have spent <?php echo $_POST['quantity_points'] ?> gold.</span>
	<br /><br />
	<span>You have successfully given <?php echo $_POST['quantity_points']; ?> point(s) to the comment above!</span>
	
	
		
<?php elseif(isset($_POST['quantity_points']) && $gold < $_POST['quantity_points']): //submitted, but not enough to pay ?>
	<!--does nothing-->
	<span>You don't have enough gold to make this transaction.</span>

	
	
<?php elseif($_SESSION['user_name'] === $comment_author): //attempt to give self points thwarted ?>
	<span>You cannot give points to your own comment, sorry.</span>

	
	
<?php else: ?>
	<div class="small_break"></div>
	<!-- asks how many points to give to comment -->
		<strong>Please read:</strong>
		<br /><br />
		• You will lose one gold for each point you give.
		<br />
		• The author, <strong><?php echo $comment_author; ?></strong> (<?php echo $comment_author_level ?>), will gain gold for each point you give.
		<br />
		• You may give a maximum of 99 points at a time.
	
	<div class="small_break"></div>
	
	<form method="POST">
		<br /><br />
		<span>I want to give </span>
		<input type="number" name="quantity_points" value="1" min="1" max="99"></input>
		<span> point(s) to the comment above!</span><br /><br />
		<input type="submit" value="(Submit)"/>
	</form>
	<div class="small_break"></div>
<?php endif; ?>	
<?php endif; //necessary for login check ?> 



<!-- Return Link -->
<br /><br />
<?php
echo '<a href="../'.$_SESSION['item'].'.php">(Return to item page)</a>';
?>


<?php include("../../accounts/views/footer.php"); ?>

</div>
</body>
</html>

<!DOCTYPE>
<?php
//Gets item data from the database using the GET value 'id' entered through the URL.

 $id = $_GET['id'];

//Connection to DB is established here
include("../accounts/config/db.php");
include("../accounts/views/db_connect.php");	

//Retrieves item data (name, etc.) from the database
$query = "SELECT * FROM item_info WHERE id='".$id."'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//Assigns item data to variables to be used
$item_raw = $row['item_raw'];
$item_name = $row['item_name'];
$image_alt = $row['image_alt'];
$item_desc = $row['item_description'];
$category = $row['category'];
$subcategory = $row['subcategory'];

if(!$item_desc) $item_desc = "View information on ".$item_name." here on DayZTip.com!";
?>

<head>
    <title><?php echo $item_name; ?> - DayZTip</title>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $item_desc; ?>">

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
		//require_once("../accounts/config/db.php");

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


<div class="small_break"></div>
<div class="content_wrapper">


<!-- Item Categorization-->


<?php
if($login->isUserLoggedIn() == true) {	//import user-specific data if logged in
	include("../accounts/views/user_info.php");
	include("../items/item_details/submit_multiplier.php");
}

if($usergroup === 'Owner' && isset($_POST['category_edit']) && isset($_POST['subcategory_edit'])):
	$query = "UPDATE item_info SET category = '".$_POST['category_edit']."' WHERE id='".$id."'";
	$result = mysqli_query($link, $query);	
	$query = "UPDATE item_info SET subcategory = '".$_POST['subcategory_edit']."' WHERE id='".$id."'";
	$result = mysqli_query($link, $query);
elseif($usergroup === 'Owner'): ?>
	<div class="content_box">
	<span id="subtle">Owner only. Caution: inputs are not scrubbed.</span>
	<br /><br />
	<form method="POST" action="">
	Category: <textarea name="category_edit" class="fancy" maxlength="50">Body Equipment</textarea><br /><br />
	Subcategory: <textarea name="subcategory_edit" class="fancy" maxlength="50"></textarea><br /><br />
	<input type="submit" value="Change categorization" />
	</form>
	</div>
	<div class="small_break"></div>
<?php endif; ?>



<a href="../index.php">DayZTip Index</a> > <a href="../items">Items</a> > 
<a href="../items/collections/<?php echo str_replace(" ", "_", strtolower($category)); ?>.php"><?php echo $category; ?></a> > 
<a href="../items/collections/<?php echo str_replace(" ", "_", strtolower($category)); ?>.php#<?php echo str_replace(" ", "_", strtolower($subcategory)); ?>"><?php echo $subcategory; ?></a> > 


<?php echo $item_name ?>
</div>
<!--END Categorization-->



<!--Item Title & Setup-->
<?php

//Configuration and setting sessions
$_SESSION['item'] = $item_raw;
$_SESSION['address'] = $address;
$_SESSION['id'] = $id;


//dip-switches for edit buttons
$image_switch = false;
$flag_switch = true;
$description_switch = false;
$options_switch = true;
$dialogue_switch = true;
$condition_switch = true;
$HTG_switch = true;
$uses_switch = true;
$comment_switch = true;
	
?>

<br />

<div class="title_bar">
	<div class="content_wrapper">
		<span class="title"><?php echo $item_name; ?></span>
	</div>
	<br /><br />
</div>
<!--END Item Title-->







<!--Item modules (includes all sections of the article)-->
<?php 
include("../items/item_details/item_modules.php"); ?>



<?php if($login->isUserLoggedIn() == true): ?> 
	<a href="../items/item_details/information_input.php?action=submit_comment">Submit a comment (+<?php echo $comment_reward ?> gold)</a>
<?php else: ?>
	<a href="../accounts/">Sign in</a> to submit a comment!
<?php endif; ?>

</div>
<!--END Comments-->



<?php include('../accounts/views/footer.php') ?>

</div>
</body>
</html>

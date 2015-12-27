<!DOCTYPE>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Consumables - DayZTip</title>

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
<?php 
include("../../accounts/views/good_stuff.php");
include("../../accounts/views/db_connect.php"); 

function collection_display_items($subcategory, $link)	//displays items of the subcategory in a table format
{
	$query = "SELECT * FROM item_info WHERE subcategory='".$subcategory."' ORDER BY item_name";
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<a href="../../item/?id='.$row['id'].'"><div class="collections">';
		echo '<div class="collection_image">';
		if($row['image_alt'])
			echo '<img src="../item_images/'.$row['item_image'].'.png" alt="'.$row['item_name'].'" class="small_restrict_height" />';
		else
			echo '<img src="../item_images/'.$row['item_image'].'.png" alt="'.$row['item_name'].'" class="small_restrict_width" />';
		echo '</div>';
		echo '<span class="collection_name" id="subtle">'.$row['item_name'].'</span>';
		echo '</div></a>';
	}

}
?>
<!--END "Good stuff"-->




<br /><br />


<div class="title_bar">
	<div class="content_wrapper">
		<span class="title">Consumable Items</span>
	</div>
	<br /><br />
</div>

<div class="content_wrapper">


<span class="subtitle" id="fruits">Fruits</span><br /><br />
<?php collection_display_items("fruits", $link); ?>

<div class="small_break" id="vegetables"></div>
<span class="subtitle">Vegetables</span><br /><br />
<?php collection_display_items("vegetables", $link); ?>

<div class="small_break" id="canned_foods"></div>
<span class="subtitle">Canned Foods</span><br /><br />
<?php collection_display_items("canned foods", $link); ?>

<div class="small_break" id="dried_foods"></div>
<span class="subtitle">Dried Foods</span><br /><br />
<?php collection_display_items("dried foods", $link); ?>

<div class="small_break" id="soda"></div>
<span class="subtitle">Soda</span><br /><br />
<?php collection_display_items("soda", $link); ?>

<div class="small_break" id="water"></div>
<span class="subtitle">Water</span><br /><br />
<?php collection_display_items("water", $link); ?>

<div class="small_break" id="rotten"></div>
<span class="subtitle">Other/Rotten</span><br /><br >
<?php collection_display_items("rotten", $link); ?>


<div class="small_break"></div>


<a href="../">(Return to item page)</a>


<?php include('../../accounts/views/footer.php') ?>

</div>
</body>
</html>
<!DOCTYPE>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Body Equipments - DayZTip</title>

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
		<span class="title">Body Equipments</span>
	</div>
	<br /><br />
</div>


<div class="content_wrapper">


<span class="subtitle" id="down_jacket">Down Jackets</span><br /><br >
<?php collection_display_items("down jackets", $link); ?>


<div class="small_break" id="gorka_military_uniform_jacket"></div>
<span class="subtitle">Gorka Military Uniform Jacket</span><br /><br >
<?php collection_display_items("gorka military uniform jacket", $link); ?>

<div class="small_break" id="hoodies"></div>
<span class="subtitle">Hoodies</span><br /><br >
<?php collection_display_items("hoodies", $link); ?>

<div class="small_break" id="orel_unit_uniform_jacket"></div>
<span class="subtitle">OREL Unit Uniform Jacket</span><br /><br >
<?php collection_display_items("orel unit uniform jacket", $link); ?>

<div class="small_break" id="paramedic_jacket"></div>
<span class="subtitle">Paramedic Jacket</span><br /><br >
<?php collection_display_items("paramedic jacket", $link); ?>

<div class="small_break" id="police_uniform_jacket"></div>
<span class="subtitle">Police Uniform Jacket</span><br /><br >
<?php collection_display_items("police uniform jacket", $link); ?>

<div class="small_break" id="raincoats"></div>
<span class="subtitle">Raincoats</span><br /><br >
<?php collection_display_items("raincoats", $link); ?>

<div class="small_break" id="riders_jacket"></div>
<span class="subtitle">Riders Jacket</span><br /><br >
<?php collection_display_items("riders jacket", $link); ?>

<div class="small_break" id="shirts"></div>
<span class="subtitle">Shirts</span><br /><br >
<?php collection_display_items("shirts", $link); ?>

<div class="small_break" id="t-shirts"></div>
<span class="subtitle">T-Shirts</span><br /><br >
<?php collection_display_items("t-shirts", $link); ?>

<div class="small_break" id="tactical_shirts"></div>
<span class="subtitle">Tactical Shirts</span><br /><br >
<?php collection_display_items("tactical shirts", $link); ?>

<div class="small_break" id="tracksuit_jackets"></div>
<span class="subtitle">Tracksuit Jackets</span><br /><br >
<?php collection_display_items("tracksuit jackets", $link); ?>

<div class="small_break" id="ttsko_jacket"></div>
<span class="subtitle">TTsKO Jacket</span><br /><br >
<?php collection_display_items("ttsko jacket", $link); ?>

<div class="small_break" id="wool coats"></div>
<span class="subtitle">Wool Coats</span><br /><br >
<?php collection_display_items("wool coats", $link); ?>

<div class="small_break" id="chest holster"></div>
<span class="subtitle">Chest Holster</span><br /><br >
<?php collection_display_items("chest holster", $link); ?>

<div class="small_break" id="anti-stab_vest"></div>
<span class="subtitle">Anti-stab Vest</span><br /><br >
<?php collection_display_items("anti-stab vest", $link); ?>

<div class="small_break" id="blue_press_vest"></div>
<span class="subtitle">Blue Press Vest</span><br /><br >
<?php collection_display_items("blue press vest", $link); ?>

<div class="small_break" id="high_capacity_vest"></div>
<span class="subtitle">High Capacity Vest</span><br /><br >
<?php collection_display_items("high capacity vest", $link); ?>

<div class="small_break" id="tactical_vest"></div>
<span class="subtitle">Tactical Vest</span><br /><br >
<?php collection_display_items("tactical vest", $link); ?>

<div class="small_break" id="uk_assault_vests"></div>
<span class="subtitle">UK Assault Vests</span><br /><br >
<?php collection_display_items("uk assault vests", $link); ?>


<div class="small_break"></div>


<a href="../">(Return to item page)</a>


<?php include('../../accounts/views/footer.php') ?>

</div>
</body>
</html>
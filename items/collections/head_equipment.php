<!DOCTYPE>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Head Equipment - DayZTip</title>

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
		<span class="title">Head Equipment</span>
	</div>
	<br /><br />
</div>

<div class="content_wrapper">



<span class="subtitle" id="eyewear">Eyewear</span><br /><br />
<?php collection_display_items("eyewear", $link); ?>
	
<div class="small_break" id="bandanas"></div>
<span class="subtitle">Bandanas</span><br /><br />
<?php collection_display_items("bandanas", $link); ?>
	
<div class="small_break" id="baseball_caps"></div>
<span class="subtitle">Baseball Caps</span><br /><br >
<?php collection_display_items("baseball caps", $link); ?>

<div class="small_break" id="beanie hats"></div>
<span class="subtitle">Beanie Hats</span><br /><br >
<?php collection_display_items("beanie hats", $link); ?>
	
<div class="small_break" id="berets"></div>
<span class="subtitle">Berets</span><br /><br >
<?php collection_display_items("berets", $link); ?>
	
<div class="small_break" id="boonie_hats"></div>
<span class="subtitle">Boonie Hats</span><br /><br >
<?php collection_display_items("boonie hats", $link); ?>
	
<div class="small_break" id="cowboy_hats"></div>
<span class="subtitle">Cowboy Hats</span><br /><br />
<?php collection_display_items("cowboy hats", $link); ?>

<div class="small_break" id="flat_caps"></div>
<span class="subtitle">Flat Caps</span><br /><br >
<?php collection_display_items("flat caps", $link); ?>
	
<div class="small_break" id="pilotka"></div>
<span class="subtitle">Pilotka</span><br /><br >
<?php collection_display_items("pilotka", $link); ?>
	
<div class="small_break" id="police cap"></div>
<span class="subtitle">Police Cap</span><br /><br >
<?php collection_display_items("police cap", $link); ?>
	
<div class="small_break" id="radar caps"></div>
<span class="subtitle">Radar Caps</span><br /><br >
<?php collection_display_items("radar caps", $link); ?>
	
<div class="small_break" id="ushankas"></div>
<span class="subtitle">Ushankas</span><br /><br >
<?php collection_display_items("ushankas", $link); ?>
	
<div class="small_break" id="zmijovka_caps"></div>
<span class="subtitle">Zmijovka Caps</span><br /><br >
<?php collection_display_items("zmijovka caps", $link); ?>
	
<div class="small_break" id="ballistic_helmets"></div>
<span class="subtitle">Ballistic Helmets</span><br /><br >
<?php collection_display_items("ballistic helmets", $link); ?>
	
<div class="small_break" id="hard_hats"></div>
<span class="subtitle">Hard Hats</span><br /><br >
<?php collection_display_items("hard hats", $link); ?>
	
<div class="small_break" id="motobike_helmets"></div>
<span class="subtitle">Motobike Helmets</span><br /><br >
<?php collection_display_items("motobike helmets", $link); ?>
	
<div class="small_break" id="zsh3_pilot_helmet"></div>
<span class="subtitle">ZSh3 Pilot Helmet</span><br /><br >
<?php collection_display_items("zsh3 pilot helmet", $link); ?>

<div class="small_break" id="masks"></div>
<span class="subtitle">Masks</span><br /><br >
<?php collection_display_items("masks", $link); ?>


<div class="small_break"></div>


<a href="../">(Return to item page)</a>


<?php include('../../accounts/views/footer.php') ?>

</div>
</body>
</html>
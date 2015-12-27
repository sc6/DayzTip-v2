<div class="content_wrapper">

<!--Edit button-->
<?php if($login->isUserLoggedIn() == true && $image_switch == true || $username==='cid'): ?> 
	<div class="edit_button"><a href="../items/item_details/information_input.php?action=edit_image" id="small">[Add]</a></div>
<?php else: ?>
	<div class="edit_button"><span id="subtle">[Locked]</span></div>
<?php endif;?>


<!--Subtitle-->
<span class="subtitle">Image on file:</span>
<br /><br />


<?php
//This file is meant to be an 'include'.
//	Provides the client with the item's image.

//Warnings:
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$_SESSION['item']		(client's last visited item page)
//	$image_alt 				(adjusts image to fit div element)




$query = "SELECT * FROM item_info WHERE item_raw='".$_SESSION['item']."'";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$item_image = $row['item_image'];
$item_name = $row['item_name'];
	
?>

<div class="image_box">
		<?php if($image_alt === 'true'): ?>
			<img src="../items/item_images/<?php echo $item_image; ?>.png" alt="<?php echo $item_name; ?>" class="fix_width" />
		<?php else: ?>
			<img src="../items/item_images/<?php echo $item_image; ?>.png" alt="<?php echo $item_name; ?>" class="fix_height" />
		<?php endif; ?>
		
	</div>
</div>

<div class="small_break"></div>




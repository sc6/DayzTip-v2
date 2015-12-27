<div class="content_wrapper">

<?php if($username === 'cid' || $description_switch == true): ?> 
	<div class="edit_button"><a href="../items/item_details/information_input.php?action=edit_description" id="small">[Add]</a></div>
<?php else: ?>
	<div class="edit_button"><span id="subtle">[Locked]</span></div>
<?php endif;?>


<span class="subtitle">Official description</span>
<br /><br />

<?php
//This file is meant to be an 'include'.
//	Provides the client with the item's official description.

//Warnings:
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$_SESSION['item']		(client's last visited item page)




$query = "SELECT * FROM `item_info` WHERE item_raw='".$_SESSION['item']."'";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$item_description = $row['item_description'];

?>

<div class="description_box">
"<?php echo $item_description; ?>"
</div>

</div>

<div class="small_break"></div>





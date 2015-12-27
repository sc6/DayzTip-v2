<div class="content_wrapper">

<?php if($login->isUserLoggedIn() == true && $options_switch == true): ?> 
	<div class="edit_button"><a href="../items/item_details/information_input.php?action=edit_options" id="small">[Add]</a></div>
<?php else: ?>
	<div class="edit_button"><span id="subtle">[Locked]</span></div>
<?php endif;?>


<span class="subtitle">Item options</span>
<br /><br />

<?php
//This file is meant to be an 'include'.
//	Provides the client with the item's dialogue outputs.

//Warnings:
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$_SESSION['item']		(client's last visited item page)




$query = "SELECT * FROM `comments` WHERE item='".$_SESSION['item']."' AND type='options' ORDER BY points DESC";
$result = mysqli_query($link, $query);


//starts the output loop
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

	$author = $row['username'];
	$comment = $row['comment'];
	$comment_id = $row['id'];

	$query_2 = "SELECT * FROM `user_stats` WHERE username='".$author."'";
	$result_2 = mysqli_query($link, $query_2);
	$row_2 = mysqli_fetch_array($result_2, MYSQLI_ASSOC);
	
	$author_level = $row_2['level'];
	
	echo 
	'<img src="../images/options_icon.png"> '.
	$comment.
	' <span id="subtle"> ' . $author . ' (' . $author_level . ')</span>';
	
	if($username == $author || $username === 'cid') 
	echo ' <span id="small"><a href="../items/item_details/delete_comment.php?comment_id='.$comment_id.'">(Delete)</a></span>';
	
	echo '<br />';
}



?>
</div>

<div class="small_break"></div>





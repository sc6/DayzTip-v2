<div class="content_wrapper">

<?php if($login->isUserLoggedIn() == true && $comment_switch == true): ?> 
	<div class="edit_button"><a href="../items/item_details/information_input.php?action=submit_comment" id="small">[Add]</a></div>
<?php else: ?>
	<div class="edit_button"><span id="subtle">[Locked]</span></div>
<?php endif;?>

<span class="subtitle">Item notes</span>
<br /><br />

<?php
//This file is meant to be an 'include'.
//	Provides the client with the item's HTG comments.

//Warnings:
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$_SESSION['item']		(client's last visited item page)



$query = "SELECT * FROM `comments` WHERE item='".$item."' AND type='other' ORDER BY points DESC";
$result = mysqli_query($link, $query);


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	//query db for each comment information
	$author = $row['username'];
	$comment = $row['comment'];
	$comment_points = $row['points'];
	$comment_id = $row['id'];

	$query_2 = "SELECT * FROM `user_stats` WHERE username='".$author."'";
	$result_2 = mysqli_query($link, $query_2);
	$row_2 = mysqli_fetch_array($result_2, MYSQLI_ASSOC);
	
	$author_level = $row_2['level'];
	
	echo '<div class="comment_box">';
	
	echo 
	'<strong>' . $author . '</strong> (' . $author_level . ') - '.$comment_points.' points: <span id="subtle">(id: '.$comment_id.')</span><br /> 
	<pre class="comment">'.$comment.'</pre>';
	
	echo '</div>';
	
	if(isset($username)) { //give point link appears
	echo
	'<span id="small"><a href="../items/item_details/vote_up.php?comment_id='.$comment_id.'">(Give points)</a></span>';
	}
	
	if($username === $author || $username === 'cid') { //edit link appears
	echo
	'&nbsp;&nbsp;<span id="small"><a href../items/item_details/edit_comment.php?comment_id='.$comment_id.'">(Edit)</a></span>';
	}
	
	if($username === $author || $username === 'cid') { //delete link appears
	echo
	'&nbsp;&nbsp;<span id="small"><a href="../items/item_details/delete_comment.php?comment_id='.$comment_id.'">(Delete)</a></span>';
	}
	
	echo '<br /><br />';
}

//note: <div> is not closed here but on the parent page.
?>
<br />
<a href="http://dayztip.com/items">(Return to item page)</a>
<br /><br />

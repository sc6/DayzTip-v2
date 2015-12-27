<?php

//This file is meant to be an 'include'.
//	Searches for the item $search_raw in item_info table

//Warnings:
//	Database connection must be made.

//Inputs:
//	$link					(connection to database)
//	$search_item			(words to be searched)

//Outputs:
//	Item link/redirect OR return to page with error message


if(isset($_POST['search'])) {	//only if client hits search
	
	$search_raw = $_POST['search'];	//the words they searched
	$search_clean = htmlspecialchars($search_raw);
	$search_clean = mysqli_real_escape_string ($link, $search_clean);

	
	//writes the sanitized comment
	$query = "SELECT * FROM item_info WHERE item_name LIKE '%".$search_clean."%';";
	$result = mysqli_query($link, $query);
	
	
	//search result printout
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo
		'<span class="subtitle">'.'<a href="../item/?id='. $row['id'] .'">'.$row['item_name'].'</a>'.'</span><br />'.
		'<div class="fit_box">'.$row['item_description'].'</div>'.//'<br />'.
		//'(Link: '.$row['link'].')'.
		'<br /><br />'
		;
		$search_count++;
	}
	
	

	

	

	
	
	
}
?>

<!--Return link-->
<div class="break"></div>
<a href='#'>Couldn't find what you were looking for?</a>
<br /><br />
<a href=".">(Return to item search)</a>

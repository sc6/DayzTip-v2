<?php
//This file is meant to be an 'include'.

//Inputs:
//	$level 				(client's level)

//Outputs:
//	$image_reward		(gold payouts for a submission based on user level)
//	$HTG_reward
//	$uses_reward
//	$comment_reward


$flag_reward = 2 * $level;
$image_reward = 25 * $level;			//change these values & multipliers
$description_reward = 10 * $level;	
$options_reward = 2 * $level;
$dialogue_reward = 2 * $level;
$condition_reward = 2 * $level;
$HTG_reward = 2 * $level;				//for gold payout change
$uses_reward = 2 * $level;
$comment_reward = 1 * $level;
$conditions_reward = 2 * $level;
?>
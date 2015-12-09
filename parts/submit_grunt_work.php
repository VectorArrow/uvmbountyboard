<?php
	$query = rtrim($query,';'); //remove semicolon (alternatively, set allow semi to true in bob's function
	$counts = countify($query);
	$new_user_data = array($username,$username,$username.'@uvm.edu');
	$new_user_query = 'INSERT IGNORE INTO Users (username,nickname,email,dateCreated) VALUES (?,?,?,NOW())';
	$new_user_results = $thisDatabaseWriter->insert($new_user_query, $new_user_data, 0, 0, 0, 0, true);
	$results = $thisDatabaseWriter->insert($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], true);//capitalized code so that table headers aren't chopped oddly if they aren't given aliases
?>

<?php
	$query = rtrim($query,';'); //remove semicolon (alternatively, set allow semi to true in bob's function
	$counts = countify($query);
	if(isset($data) and is_array($data)){
		$results = $thisDatabaseReader->select($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], false, false, true);
	}else
		$results = $thisDatabaseReader->select($query, "", $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], false, false, true);//capitalized code so that table headers aren't chopped oddly if they aren't given aliases
?>

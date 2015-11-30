<?php include('parts/head.php'); ?>
<body>
<main>
<?php   
	$whitelisted = true;
	if($whitelisted):
		$dbUserName = get_current_user() . '_reader';
		$whichPass = "r"; //flag for which one to use.
		$dbName = 'SWREINHA_bountyboard'; //get_current_user() . '_bountyboard';
		$thisDatabaseReader = new Database($dbUserName, $whichPass, $dbName);
		$query = 'SELECT * from Items';
		//$query = rtrim(file_get_contents($number . '.sql')); //prepare the query
		$query = rtrim($query,';'); //remove semicolon (alternatively, set allow semi to true in bob's function)
?>
<p>
	<?php 
		$counts = countify($query);
		$results = $thisDatabaseReader->select($query, "", $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], false, false, true);//running     capitalized code so that table headers aren't chopped oddly if they aren't given aliases
	?>
	<ul class='items-list'>
	<?php foreach ($results as $row){?>
		<li class='item'>
			<h3 class='name title'><?php echo $row['name']; ?></h3>
			<div class='location'><?php echo $row['location']; ?></div>
			<div class='dateLost'><?php echo $row['dateLost'] ?></div>
			<p class='description'><?php echo $row['description'] ?></p>
		</li>
	<?php } ?>
	</ul>
</p>
<?php else: ?>
<p>Sorry, your query has failed basic security checks.</p>
<?php endif; ?>
</main>
</body>
</html>

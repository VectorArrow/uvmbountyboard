<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$whitelisted = true;
	if($whitelisted):
		include_once('grunt_work.php');
		$dbUserName = get_current_user() . '_reader';
		$whichPass = "r"; //flag for which one to use.
		$dbName = 'SWREINHA_bountyboard'; //get_current_user() . '_bountyboard';
		$thisDatabaseReader = new Database($dbUserName, $whichPass, $dbName);
		$query = 'SELECT * from Users';// WHERE username='. $username;
		//$query = rtrim(file_get_contents($number . '.sql')); //prepare the query
		$query = rtrim($query,';'); //remove semicolon (alternatively, set allow semi to true in bob's function)
?>
<?php 
	$counts = countify($query);
	$results = $thisDatabaseReader->select($query, "", $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], false, false, true);//running     capitalized code so that table headers aren't chopped oddly if they aren't given aliases
?>
<ul class='items-list'>
	<?php foreach ($results as $row){?>
		<article class='person'>
			<?php foreach ($row as $key => $value){
				echo '<div class="' . $key . '">' . $key . ': ' . $value . '</div>';
			} ?>
		</article>
	<?php } ?>
</ul>
<?php else: ?>
<p>Sorry, your query has failed basic security checks.</p>
<?php endif; ?>
</main>
</body>
</html>

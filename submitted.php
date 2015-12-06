<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<?php
	$whitelisted = true;
	print_r($data);
	if ($_POST['id'] != null):
		if ($whitelisted):
			$data = array(
	                	$username,
	                	htmlentities($_POST['name']),
	                	date('Y-m-d'),
	                	htmlentities($_POST['dateLost']),
	                	htmlentities($_POST['category']),
	               		htmlentities($_POST['description']),
	                	htmlentities($_POST['location']),
	                	htmlentities($_POST['status'])
	          	);
							$query = 'UPDATE Items SET `name`=name,`category`=category,`description`=description,`location`=location,`status`=status WHERE 1';
			endif;
	else:
		if ($whitelisted):

			//$query = 'INSERT IGNORE INTO Users (username,nickname,email) VALUES ("'.$username.'","'.$username.'","'.$username.'@uvm.edu")';
			//include(
			$data = array(
	                	$username,
	                	htmlentities($_POST['name']),
	                	date('Y-m-d'),
	                	htmlentities($_POST['dateLost']),
	                	htmlentities($_POST['category']),
	               		htmlentities($_POST['description']),
	                	htmlentities($_POST['location']),
	                	htmlentities($_POST['status'])
	          	);
			$query = 'INSERT INTO Items (username,name,dateCreated,dateLost,category,description,location,status) VALUES (?,?,?,?,?,?,?,?)';
			require_once('parts/submit_grunt_work.php');
			$primaryKey = $thisDatabaseWriter->lastInsert(); ?>
		<h3>Your item has been submitted.</h3><p>You can view it <a href='item.php?id=<?php echo $primaryKey ?>'>here</a>.</p>
	<?php	else: ?>;

	<p>Basic security checks were not passed</p>
<?php endif;endif; ?>
</section>
</main>
</body>
</html>

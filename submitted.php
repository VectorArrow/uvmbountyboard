<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<?php
	$whitelisted = true;
	print_r($data);
	if ($whitelisted):
		if ($_POST['id'] != null):
				$data = array(
		                	htmlentities($_POST['name']),
		                	htmlentities($_POST['category']),
		               		htmlentities($_POST['description']),
		                	htmlentities($_POST['location']),
		                	htmlentities($_POST['status']),
											htmlentities($_POST['id'])
		          	);
								$query = 'UPDATE Items SET name=?,category=?,description=?,location=?,status=? WHERE id=?';
								require_once('parts/update_grunt_work.php');
								$primaryKey = $_POST['id'];?>
								<h3>Your item has been edited.</h3><p>You can view it <a href='item.php?id=<?php echo $primaryKey ?>'>here</a>.</p>
		<?php else:

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
			<h3>Your item has been submitted.</h3><p>You can view it <a href='item.php?id=<?php echo $primaryKey ?>'>here</a>.</p><?php endif; ?>
<?php	else: ?>;
		<p>Basic security checks were not passed</p>
<?php endif; ?>
</section>
</main>
</body>
</html>

<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<?php
	$whitelisted = true;
	if ($whitelisted):
		if ($_POST['submit'] === 'edit_item' ):
			if($_FILES["image"]["name"] === ''){
				$data = array(
			               	htmlentities($_POST['name']),
			               	htmlentities($_POST['category']),
			       		htmlentities($_POST['description']),
			    		htmlentities($_POST['location']),
					htmlentities($_POST['status']),
					htmlentities($_POST['dateLost']),
					htmlentities($_FILES["image"]["name"]),
					htmlentities($_POST['id']),
		       		);
				$query = 'UPDATE Items SET name=?,category=?,description=?,location=?,status=?,dateLost=?,image=? WHERE id=?';
			}else{
				$data = array(
                                        htmlentities($_POST['name']),
                                        htmlentities($_POST['category']),
                                        htmlentities($_POST['description']),
                                        htmlentities($_POST['location']),
                                        htmlentities($_POST['status']),
                                        htmlentities($_POST['dateLost']),
                                        htmlentities($_POST['id']),
                                );
                                $query = 'UPDATE Items SET name=?,category=?,description=?,location=?,status=?,dateLost=? WHERE id=?';
			}
			require_once('parts/update_grunt_work.php');
			$primaryKey = $_POST['id'];
			if(!($_FILES["image"]["name"] === '')){	
				require_once('parts/image_uploader.php'); 
			}
?>
			<h3>Your item has been edited.</h3><p>You can view it <a href='item.php?id=<?php echo $primaryKey ?>'>here</a>.</p>
		<?php else:
			$data = array(
	                	$username,
	                	htmlentities($_POST['name']),
	                	date('Y-m-d'),
	                	htmlentities($_POST['dateLost']),
	                	htmlentities($_POST['category']),
	               		htmlentities($_POST['description']),
	                	htmlentities($_POST['location']),
	                	htmlentities($_POST['status']),
				htmlentities($_FILES["image"]["name"]),
	          	);
			$query = 'INSERT INTO Items (username,name,dateCreated,dateLost,category,description,location,status,image) VALUES (?,?,?,?,?,?,?,?,?)';
			include('parts/submit_grunt_work.php');
			$primaryKey = $thisDatabaseWriter->lastInsert();
			require_once('parts/image_uploader.php');

			$data = array( $username );
			$query = 'SELECT email FROM Users WHERE username=? AND username<>swreinha'; 
			include('parts/grunt_work.php');
			if(! empty($results)){
				mail($results[0]['email'],'UVM Bounty Board','Your item has been posted');
			}

?>
		<h3>Your item has been submitted.</h3><p>You can view it <a href='item.php?id=<?php echo $primaryKey ?>'>here</a>.</p>
	<?php endif; ?>
<?php else: ?>;
	<p>Basic security checks were not passed</p>
<?php endif; ?>
</section>
</main>
</body>
</html>

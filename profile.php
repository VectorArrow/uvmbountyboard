<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   

	$whitelisted = true;
	$query = 'SELECT * from Users WHERE username="'.$username.'"';
	if ($whitelisted):
	include('parts/grunt_work.php');
?>
<section class='items-list content'>
	<?php foreach ($results as $row){?>
		<article class='person'>
			<h3 class='name title'><?php echo $row['username']; ?></h3>
			<div class='sub'> 
				<div class='dateCreated'><?php echo $row['dateCreated']; ?></div>
			</div>
			<p class='nickname'><?php echo $row['nickname']; ?></p>
			<p class='email'><?php echo $row['email']; ?></p>
		</article>
	<?php } ?>
</section>
<?php endif; ?>
</main>
</body>
</html>

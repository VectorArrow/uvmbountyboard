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
			<?php if ($currentUser == $row['username']):
			print "<p class='edit'><a href='editProfile.php'>Edit</a></p>"; endif;?>
			 <?php if ($adminLevel[0][0] == 0){ ?>
                        <p class='admin'><a href='backend.php'>Admin Page</a></p>
                	<?php }  ?>
		</article>
	<?php } ?>
</section>
<?php endif; ?>
</main>
</body>
</html>

<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$whitelisted = true;
	$query = 'SELECT * from Items WHERE username="'.$username.'"';
	if ($whitelisted):
	include('parts/grunt_work.php');
?>
<section class='items-list content'>
	<?php foreach ($results as $row){?>
		<article class='item'>
			<h3 class='name title'><a href='item.php?id=<?php echo $row["id"];?>'><?php echo $row['name']; ?></a></h3>
			<div class='location'><?php echo $row['location']; ?></div>
			<div class='dateLost'><?php echo $row['dateLost'] ?></div>
			<p class='description'><?php echo $row['description'] ?></p>
		</article>
	<?php } ?>
</section>
<?php endif; ?>
</main>
</body>
</html>

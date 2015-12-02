<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$whitelisted = true;
	$id = preg_replace("/[^0-9]/","",htmlspecialchars($_GET["id"]));
	if ($id === "") $whitelisted = false;
	if ($whitelisted):
	$query = 'SELECT * from Items WHERE id='.$id;
	include('parts/grunt_work.php');
?>
<section class='content'>
<?php foreach ($results as $row){?>
	<article class='item'>
		<h3 class='name title'><a href='item.php?id=<?php echo $row["id"];?>'><?php echo $row['name']; ?></a></h3>
		<div class='location'><?php echo $row['location']; ?></div>
		<div class='dateLost'><?php echo $row['dateLost'] ?></div>
		<p class='description'><?php echo $row['description'] ?></p>
	</article>
	<?php } ?>
</section>
<?php else: echo 'Not a valid item.'; endif; ?>
</main>
</body>
</html>

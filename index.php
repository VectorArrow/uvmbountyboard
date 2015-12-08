<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$whitelisted = true;
	$query = 'SELECT * from Items WHERE status<>"closed"';
	if ($whitelisted):
	include('parts/grunt_work.php');
?>
<section class='items-list content'>
	<?php foreach ($results as $row){?>
		<article class='item rotate<?php echo rand(0,2); echo ' '.$row['status'];?>'>
			<a href='item.php?id=<?php echo $row["id"];?>'>
				<?php 
				$imagePath = 'uploads/'.$row['username']."/".$row['id']."/".$row['image'];
				if (file_exists($imagePath) && !empty($row['image'])): 
				?>
				<div class='item-image' style='background-image:url(<?php echo $imagePath; ?>);'></div>
				<?php endif; ?>
				<h3 class='name title'><?php echo $row['name']; ?></h3>
				<div class='sub'> 
					<div class='location'><?php echo $row['location']; ?></div>
					<div class='dateLost'><?php echo $row['dateLost'] ?></div>
				</div>
				<p class='description'><?php echo $row['description'] ?></p>
			</a>
		</article>
	<?php } ?>
</section>
<?php endif; ?>
</main>
</body>
</html>

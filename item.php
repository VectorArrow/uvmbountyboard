<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php
	$whitelisted = true;
	$id = preg_replace("/[^0-9]/","",htmlspecialchars($_GET["id"]));
	if ($id === "") $whitelisted = false;
	if ($whitelisted):
	$query = 'SELECT * from Items INNER JOIN Users ON Items.username=Users.username WHERE id='.$id;
	include('parts/grunt_work.php');
?>
<section class='content'>
<?php foreach ($results as $row){?>
	<article class='item'>
		<h3 class='<?php echo $row['status']; ?> name title'><?php echo $row['name']; ?></h3>
		<div class='sub'>
			<div class='auther'>Posted by: <?php echo $row['nickname']; ?></div>
			<div class='contact'>Email: <?php echo $row['email']; ?></div>
			<div class='location'>Location: <?php echo $row['location']; ?></div>
			<div class='dateLost'>Date: <?php echo $row['dateLost'] ?></div>

		</div>
		 <?php
                        $imagePath = 'uploads/'.$row['username']."/".$row['image'];
                        if (file_exists($imagePath) && !empty($row['image'])):
                ?>
                <img class='item-image' src='<?php echo $imagePath; ?>'>
                <?php endif; ?>
		<p class='description'><?php echo $row['description'] ?></p>
		<?php if ($username == $row['username'] or $adminLevel == 0){
			print "<p class='edit'><a href='editItem.php?id=$id'>Edit</a></p>";
		}  ?>
	</article>
	<?php } ?>
</section>
<?php else: echo 'Not a valid item.'; endif; ?>
</main>
</body>
</html>

<?php 
$pages = array(
	'index'=> 'Home',
	'form' => 'Submit',
	'item' => 'Manage Items',
	'profile' => 'Profile',
	'alerts' => 'Alerts'
); 
?>
<nav class='main'>
	<ul>
	<?php foreach ($pages as $key => $value){ ?>
		<li <?php if(strcmp($page, $key)==0) echo 'class="active"'; ?>>
			<a href='<?php echo $key; ?>.php'><?php echo $value; ?></a>
		</li>
	<?php } ?>
	</ul>
</nav>

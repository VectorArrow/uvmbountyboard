<?php
$query = 'SELECT username from Users';
include('parts/grunt_work.php');
$exists = false;
foreach ($results as $row){
	if ($username == $row['username']):
		$exists = true;
	endif;
}
if ($exists):
	$pages = array(
		'index'=> 'Home',
		'form' => 'Submit',
		'manage' => 'Your Items',
		'profile' => 'Profile',
		'alerts' => 'Alerts'
	);
else:
	$pages = array(
		'index'=> 'Home',
		'form' => 'Submit',
		'alerts' => 'Alerts'
	);
endif;
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

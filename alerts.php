<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$whitelisted = true;
	$data = array( $username );
	$query = 'INSERT INTO Alerts (username,location,keywords) VALUES (?,?,?)';
	if ($whitelisted):
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$keywords = '';
			$keywords .= isset($_POST['Pets'])?$_POST['Pets']:'';
			$keywords .= isset($_POST['Phones'])?(','.$_POST['Phones']):'';
			$keywords .= isset($_POST['Bikes'])?(','.$_POST['Bikes']):''; 
			$keywords .= isset($_POST['Clothing'])?(','.$_POST['Clothing']):'';
			$keywords .= isset($_POST['Other'])?(','.$_POST['Other']):'';
			$keywords = trim($keywords,',');	 
			$data = array(
				$username,
				htmlentities($_POST['location']),
				htmlentities($keywords),
			);
			include('parts/submit_grunt_work.php');
		}	
	$data = array( $username );
	$query = 'SELECT * from Alerts WHERE username=?';
	include('parts/grunt_work.php');
?>
<section class='halves content'>
	<form action='alerts.php' method='post' enctype="multipart/form-data">
        <h2>Create an alert for:</h2>
        <fieldset>
		<p>	
		<label for='location'>Location:</label>
			<select id='location' name='location'>
				<option value='Athletic-Campus'>Athletic Campus</option>
				<option value='Centennial-Field'>Centennial Field</option>
				<option value='Central-Campus'>Central Campus</option>
				<option value='East-Annex'>East Annex</option>
				<option value='Medical'>Medical</option>
				<option value='Redstone-Campus'>Redstone Campus</option>
				<option value='University-Heights'>University Heights</option>
				<option value='University-Green'>University Green</option>
				<option value='Other'>Other</option>
			</select>
		</p>
		<label for='category'>Categories:</label>
			<fieldset id='category'>
				<label><input type='checkbox' name='Pets' value='Pets'>Pet</label>
				<label><input type='checkbox' name='Phones' value='Phones'>Phone</label>
				<label><input type='checkbox' name='Bikes' value='Bikes'>Bike</label>	
				<label><input type='checkbox' name='Clothing' value='Clothing'>Clothing</label>
				<label><input type='checkbox' name='Other' value='Other'>Other</label>
			</fieldset>			
		</p>
        </fieldset>
        <button type="submit" name='submit' value='new_alert'>Submit</button>
	</form>

	<?php foreach ($results as $row){?>
		<article class='alert'>
			<div class='location'><?php echo $row['location']; ?></div>
			<div class='keywords'><?php echo $row['keywords'] ?></div>
		</article>
	<?php } ?>
</section>
<?php endif; ?>
</main>
</body>
</html>

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
  include('parts/grunt_work.php'); endif;
?>
<section class='content'>
  <?php foreach ($results as $row){?>
  <form action='updated.php' method='post'>
  	<h2>Submit a Lost or Found Item</h2>
  	<fieldset>
  		<p>
  		<label for='name'>Item Name:</label>
  			<input type='text' name='name' value='<?php echo $row['name']; ?>'>
  		</p>
  		<p>
  		<label for='dateLost'>Date Lost/Found:</label>
  			<input type='date' name='dateLost' value='<?php echo $row['dateLost']; ?>'>
  		</p>
  		<p>
  		<label for='location'>Location:</label>
  			<select id='location' name='location' value=' <?php echo $row['location']; ?>'>
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
  		<p>
  		<label for='description'>Description:</label>
  			<textarea id='description' rows='8' cols='50' name='description' value='<?php echo $row['description']; ?>'></textarea>
  		</p>
  		<p>
  		<label for='category'>Categories:</label>
  			<fieldset id='category'>
  				<label><input type='checkbox' name='category' value='Pets'>Pet</label>
  				<label><input type='checkbox' name='category' value='Phones'>Phone</label>
  				<label><input type='checkbox' name='category' value='Bikes'>Bike</label>
  				<label><input type='checkbox' name='category' value='Clothing'>Clothing</label>
  				<label><input type='checkbox' name='category' value='Other'>Other</label>
  			</fieldset>
  		</p>
  		<label for='status'>Status:</label>
                          <fieldset id='status'>
                                  <label><input type='radio' name='status' value='Lost' checked>Lost</label>
                                  <label><input type='radio' name='status' value='Found'>Found</label>
                          </fieldset>
                  </p>
  </fieldset>
  	<input type="submit">
  </form>
  	<?php } ?>
  </section>
  </main>
  </body>
  </html>

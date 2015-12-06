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
  <form action='submitted.php' method='post'  enctype="multipart/form-data">
  	<h2>Edit your item</h2>
  	<fieldset>
		 <input type="hidden" name='id' value="<?php echo htmlspecialchars($row['id']); ?>" required>
  		<p>
  		<label for='name'>Item Name:</label>
  			<input type='text' name='name' value='<?php echo htmlspecialchars($row['name']); ?>' required>
  		</p>
		<p>
		 <label for='image'>Image:</label>
                        <input type="file" name="image" accept="image/*" id='image' required>
                </p>
  		<p>
  		<label for='dateLost'>Date Lost/Found:</label>
  			<input type='date' name='dateLost' value='<?php echo htmlspecialchars($row['dateLost']); ?>' required>
  		</p>
  		<p>
  		<label for='location'>Location:</label>
  			<select id='location' name='location' value=' <?php echo htmlspecialchars($row['location']); ?>'>
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
  			<textarea id='description' rows='8' cols='50' name='description' required><?php echo htmlspecialchars($row['description']); ?></textarea>
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
                                  <label><input type='radio' name='status' value='Closed'>Closed</label>
                          </fieldset>
                  </p>
  </fieldset>
	<button type='submit' name='submit' value='edit_item'>Submit</p>
  </form>
  	<?php } ?>
  </section>
  </main>
  </body>
  </html>

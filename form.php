<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<form action='submitted.php' method='post'>
	<h2>Submit a Lost or Found Item</h2>
	<fieldset>
		<p>
		<label for='itemName'>Item Name:</label>
			<input type='text' name='itemName'>
		</p>
		<p>
		<label for='dateLost'>Date Lost/Found:</label>
			<input type='date' name='dateLost'>
		</p>
		<p>
		<label for='location'>Location:</label>
			<input id='location' type='text' name='location'>
		</p>
		<p>
		<label for='description'>Description:</label>
			<textarea id='description' rows='8' cols='50'></textarea>
		</p>
		<p>
		<label for='category'>Category:</label>
			<input id='category' type='text' name='category'>
		</p>
	</fieldset>
	<input type="submit">
</form>
</section>
</main>
</body>
</html>

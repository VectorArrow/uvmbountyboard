<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<form action='profileEdited.php' method='post'>
  <h2>Edit your profile</h2>
	<fieldset>
		<p>
    <label for ='nickname'>Nickname:</label>
    <input type="text" name='nickname'>
  </p>
  <p>
    <label for ='email'>Email:</label>
    <input type="text" name='email'>
  </p>
  </fieldset>
  <input type="submit">
</form

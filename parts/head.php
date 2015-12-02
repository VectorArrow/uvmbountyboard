<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang=en>
<head>
        <meta charset=utf-8>
        <title>CS148 Assignment3.0</title>
        <meta name="description" content="Homework Assignment 10.0 for CS148">
        <meta name="author" content="<?php echo get_current_user(); ?>">

	<?php 	require_once( "bin/Database.php"); 	
		require_once("bin/countCode.php"); ?>

        <link rel='stylesheet' type="text/css" href='style/style.css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<?php $username = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8"); ?>

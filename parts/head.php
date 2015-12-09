<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang=en>
<head>
        <meta charset=utf-8>
        <title>UVM Bounty Board</title>
        <meta name="description" content="Homework Assignment 10.0 for CS148">
        <meta name="author" content="<?php echo get_current_user(); ?>">

	<?php 	require_once( "bin/Database.php");
		require_once("bin/countCode.php"); ?>

        <link rel='stylesheet' type="text/css" href='style/style.css'>
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower|Cabin|Arvo|Josefin+Sans' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<?php $username = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8"); $page='';?>
<?php $currentUser = get_current_user(); ?>
<?php  
	$dbUserName = get_current_user() . '_reader';
        $whichPass = "r"; //flag for which one to use.
        $dbName = strtoupper(get_current_user()) . '_bountyboard';
        $thisDatabaseReader = new Database($dbUserName, $whichPass, $dbName);

 	$dbUserName = get_current_user() . '_writer';
        $whichPass = "w"; //flag for which one to use.
        $thisDatabaseWriter = new Database($dbUserName, $whichPass, $dbName);

?>
<?php include('parts/admin_test.php'); ?>

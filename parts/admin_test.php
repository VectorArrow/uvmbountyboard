<?php
	$adminData = array( $username );
        $adminQuery = 'SELECT accessLevel FROM Admins WHERE username=?';
        $adminLevel = $thisDatabaseReader->select($adminQuery, $adminData);
?>

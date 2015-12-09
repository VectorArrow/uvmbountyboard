<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$validTables = array('Items', 'Users', 'Admins', 'Alerts');
	foreach ($validTables as $tableref){
		echo '<a href="backend.php?table=' . $tableref . '">' . $tableref . '</a>';
	} 
	$validkeyNames = array('id', 'username');

	$tableName = htmlspecialchars($_GET['table']);
	$pkey = htmlspecialchars($_GET['key']);
	$keyName = htmlspecialchars($_GET['keyname']);
	

	$whitelisted = (in_array($tableName,$validTables))&&(in_array($tableName,$validTables));
	if ($whitelisted && $adminLevel[0][0] == 0):
	$data = array($pkey);
	$query = 'SELECT * FROM ' . $tableName . ' WHERE ' . $keyName . '=?';
	include('parts/grunt_work.php');
	if (isset($_POST['save'])){
	      	$query = 'UPDATE ' . $tableName . ' SET ';
        	foreach($results[0] as $key => $value):
			$query .= $key . "='".htmlspecialchars($_POST[$key])."',";
			$results[0][$key] = htmlspecialchars($_POST[$key]);
	        endforeach;
		$query = rtrim($query,',') . " WHERE " . $keyName . "='" . $pkey . "'";
		$data = '';
		$counts = countify($query);
		$thisDatabaseWriter->insert($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], true);
	 		
	}elseif(isset($_POST['delete'])){
		$data = array($pkey);
		$query='DELETE FROM ' .  $tableName .  ' WHERE ' . $keyName . '=?';
		$counts = countify($query);
                $thisDatabaseWriter->delete($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], false);
	}elseif(isset($_POST['new'])){
		$query = ' ' . $tableName . '(';
                foreach($results[0] as $key => $value):
                        $query .= $key . ',';
                endforeach;
                $query = rtrim($query,',') . ')' . ' VALUES (';
                foreach($results[0] as $key => $value):
                        $query .= "'".htmlspecialchars($_POST[$key]) . "',";
                endforeach;
                $query = rtrim($query,',') . ')';
                $data = '';
                $counts = countify($query);
                $thisDatabaseWriter->insert($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], true);

	}
	?>
<section class='admin content'>
	<div class='table-wrap-x'>
        <div class='table-wrap-y'> <!-- this may seem insane, but need for sensical scrollbars on the table. -->
	<h3><?php echo $tableName ?></h3>
        <form method='post' action=''> 
        <?php foreach ($results as $row){?> 
                <?php
                foreach($row as $key => $value){?>
	                <div class='wrap'><label name='<?php echo $key;?>'><?php echo $key;?></label><input name='<?php echo $key;?>' value='<?php echo $value;?>'></input></td>
			<?php } ?>
			<input type='submit' name='save' Value='Save'></input><input type='submit' name='delete' value='Delete'></input>
        <?php } ?>
        </form>
        </div>
        </div>
</section>
<?php endif; ?>
</main>
</body>
</html>

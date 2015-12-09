<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<?php   
	$validTables = array('Items', 'Users', 'Admins', 'Alerts');
	foreach ($validTables as $tableref){
		echo '<a href="backend.php?table=' . $tableref . '">' . $tableref . '</a>';
	}
	$tableName = htmlspecialchars($_GET['table']);
	$whitelisted = (in_array($tableName,$validTables));
	if ($whitelisted && $adminLevel[0][0] == 0):
	if (isset($_POST['new'])){
                $query = 'INSERT  INTO ' . $tableName . ' () VALUES ()';
                $data = '';
                $counts = countify($query);
                $thisDatabaseWriter->insert($query, $data, $counts['where'], $counts['condition'], $counts['quote'], $counts['symbol'], true);
		
        }
	$query = 'SELECT * from ' . $tableName;
	include('parts/grunt_work.php');

?>
<section class='admin content'>
	<div class='table-wrap-x'>
        <div class='table-wrap-y'> <!-- this may seem insane, but need for sensical scrollbars on the table. -->
	<h3><?php echo $tableName; ?></h3>
	<form action='' method='post'><input type='submit' name='new' value='New Row'></input></form>	
        <table id='admin-table'>
                <tr class='table-row'>
                 <?php
                foreach (array_keys($results[0]) as $key):?>
                        <th class='table-cell table-label'><?php echo $key; ?></th>
                <?php endforeach; ?>
                </tr>
        <?php foreach ($results as $row){?>
                <tr class='table-row'>
                <?php foreach($row as $value): ?>
                                <td class='table-cell'><?php echo $value;?></td>
                <?php endforeach; ?>
			<td><a href='editAny.php?table=<?php echo $tableName; ?>&key=<?php echo $row[array_keys($results[0])[0]]; ?>&keyname=<?php echo array_keys($results[0])[0]; ?>'>Edit</a></td>
                </tr>
        <?php } ?>
        </table>
        </div>
        </div>
</section>
<?php endif; ?>
</main>
</body>
</html>

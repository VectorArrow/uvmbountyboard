<?php include('parts/head.php'); ?>
<body>
<?php require_once('parts/header.php'); ?>
<main>
<section class='content'>
<?php
  $whitelisted = true;
  if ($whitelisted):

    $data = array(
                  htmlentities($_POST['nickname']),
                  htmlentities($_POST['email']),
                  $username
              );
              $query ='UPDATE Users SET nickname=?,email=? where username=?';
              require_once('parts/update_grunt_work.php');?>
              <h3>Your profile has been edited.</h3>
<?php	else: ?>;
    <p>Basic security checks were not passed</p>
<?php endif; ?>
</section>
</main>
</body>
</html>

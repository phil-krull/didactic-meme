<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/signin.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
  <div class="container">
    <form class="form-signin" action="/sessions" method="post">
      <h2 class="form-signin-heading">Login</h2>
      <label for="inputEmail" class="sr-only">Email:</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email">
      <label for="inputPassword" class="sr-only">Password:</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p>
        <? if ($this->session->flashdata('errors')) { ?>
          <?= $this->session->flashdata('errors') ?>
        <? } ?>
      </p>
      <a href="/register">Don't have an account? Register</a>
    </form>
  </div><!-- end of container -->
</body>
</html>
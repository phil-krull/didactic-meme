<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/register.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
  <div class="container">
    <form class="form-signin" action="/users" method="post">
      <h2 class="form-signin-heading">Register</h2>
      <label for="inputFirstName" class="sr-only">First Name:</label>
      <input type="firstName" id="inputFirstName" class="form-control" placeholder="First Name" name="first_name">
      <label for="inputLastName" class="sr-only">Last Name:</label>
      <input type="lastName" id="inputLastName" class="form-control" placeholder="Last Name" name="last_name">
      <label for="inputEmail" class="sr-only">Email:</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email">
      <label for="inputPassword" class="sr-only">Password:</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
      <label for="inputPasswordConfirmation" class="sr-only">Confirm Password:</label>
      <input type="password" id="inputPasswordConfirmation" class="form-control" placeholder="Confirm Password" name="password_confirmation">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <? if ($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors') ?>
      <? } ?>
      <a href="/login">Already have an account? Login</a>
    </form>
  </div><!-- end of container -->
</body>
</html>
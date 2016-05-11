<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/index.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
  <div class="container">
    <div class="main">
      <div class="header">
        <h1>User Dashboard</h1>
        <p>Don't have an account? <a href="/register">Register</a> | Already have an account? <a href="/login">Login</a></p>
      </div><!-- end of header -->
      <div class="info">
        <h3>Manage Your profile</h3>
        <p>Using this application, you can create and update your own profile.</p>
      </div><!-- end of info -->
      <div class="info">
        <h3>Leave messages</h3>
        <p>Users will be able to leave a message to another user using this application.</p>
      </div><!-- end of info -->
      <div class="info">
        <h3>Edit User Information</h3>
        <p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
      </div><!-- end of info -->
    </div><!-- end of main -->
  </div><!-- end of container -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/admin/edit.css"); ?>">
  <script type="text/javascript"></script>
</head>
<body>
  <a href="/dashboard">Return to Dashboard</a>
  <form action="/sessions/destroy" method="post">
    <button class="btn btn-primary btn-sm" type="submit">Logout</button>
  </form>
  <div class="container">
    <div class="mainContent">
    <h2>Edit Profile</h2>
      <div class="leftContent">
      <h3>Edit Information</h3>
        <form action="/admins/update/<?= $user['id'] ?>" method="post">
          <div class="form-group">
            <label for="inputFirstName">First Name:</label>
            <input class="form-control" type="text" name="first_name" value="<?= $user['first_name'] ?>">
          </div><!-- end of form-group -->
          <div class="form-group">
            <label for="inputLastName">Last Name:</label>
            <input class="form-control" type="text" name="last_name" value="<?= $user['last_name'] ?>">
          </div><!-- end of form-group -->
          <div class="form-group">
            <label for="inputEmail">Email:</label>
            <input class="form-control" type="email" name="email" value="<?= $user['email'] ?>">
          </div><!-- end of form-group -->
          <div class="form-group">
            <label for="inputUserLevel">User Level:</label>
            <select name="user_level">
              <option selected disabled>Choose a level</option>
              <option>Normal</option>
              <option>Admin</option>
            </select>
          </div><!-- end of form-group -->
          <button class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
      </div><!-- end of leftContent 
    --><div class="rightContent">
        <h3>Change Password</h3>
        <form action="/users/password_update/<?= $user['id'] ?>" method="post">
          <div class="form-group">
            <label for="inputPassword">Password:</label>
            <input class="form-control" type="password" name="password">
          </div><!-- end of form-group -->
          <div class="form-group">
          <label>Confirm Password:</label>
            <input class="form-control" type="password" name="password_confirmation">
          </div><!-- end of form-group -->
          <button class="btn btn-primary btn-sm" type="submit">Update Password</button>
            <!-- <input type="submit" value="Update Password"> -->
        </form>
      </div><!-- end of rightContent -->
    </div><!-- end of main content -->
    <? if ($this->session->flashdata('errors')) { ?>
      <?= $this->session->flashdata('errors') ?>
    <? } ?>
  </div><!-- end of container -->
</body>
</html>
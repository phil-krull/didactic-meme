<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/users/edit.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
  <a href="/dashboard">Return to dashboard</a>
  <form action="/sessions/destroy" method="post">
    <button class="btn btn-primary btn-sm" type="submit">Logout</button>
  </form>
  <div class="container">
    <?php if ($this->session->flashdata('errors')) { ?>
      <span><?= $this->session->flashdata('errors') ?></span>
    <?php } ?>
    <h2>Edit Profile</h2>
    <div class="editInfo">
      <h3 class="form-edit-heading">Edit Information</h3>
        <form class="form-edit" action="/users/update/<?= $user['id'] ?>" method="post">
          <label for="inputFirstName">First Name:</label>
          <input type="firstName" id="inputFirstName" class="form-control" name="first_name" value="<?= $user['first_name'] ?>">
          <label for="inputLastName">Last Name:</label>
          <input type="lastName" id="inputLastName" class="form-control" name="last_name" value="<?= $user['last_name'] ?>">
          <label for="inputEmail">Email:</label>
          <input type="email" id="inputEmail" class="form-control" name="email" value="<?= $user['email'] ?>">
          <button class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
      <h3 class="form-edit-heading">Change Password</h3>
        <form action="/users/password_update/<?= $user['id'] ?>" method="post">
          <label for="inputPassword">Password:</label>
          <input type="password" id="inputPassword" class="form-control" name="password">
          <label for="inputConfirmPassword">Confirm Password:</label>
          <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation">
          <button class="btn btn-primary btn-sm" type="submit">Update Password</button>
        </form>
      <h3 class="form-edit-heading">Edit Description</h3>
        <form action="/users/update/<?= $user['id'] ?>" method="post">
          <textarea name="description"></textarea>
          <span class="button"><button class="btn btn-primary btn-sm" type="submit">Save</button></span>
        </form>
    </div><!-- end of editInfo -->
  </div><!-- end of container -->
</body>
</html>
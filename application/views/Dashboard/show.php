<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/admin/edit.css"); ?>">
</head>
<body>
  <div class="container">
    <?php if ($this->session->flashdata('errors')) { ?>
      <p><span><?= $this->session->flashdata('errors') ?></span></p>
    <?php } ?>
    <form action="/sessions/destroy" method="post">
      <button class="btn btn-primary btn-sm" type="submit">Logout</button>
    </form>
    <h2>All Users</h2>
    <a href="/users/edit">My Profile</a>
  <table class="table table-striped">
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Register Date</td>
        <td>User Level</td>
      </tr>
      <?php foreach($users as $key => $value) { ?>
      <tr>
        <td><?= $value['id'] ?></td>
        <td><a href="/users/show/<?= $value['id'] ?>"><?= $value['first_name'] ?> <?= $value['last_name'] ?></a></td>
        <td><?= $value['email'] ?></td>
        <td><?= date("M d, Y", strtotime($value['created_at'])) ?></td>
        <td><?= $value['user_level'] ?></td>
      </tr>
     <?php } ?>
    </table>
  </div><!-- end of container -->
</body>
</html>
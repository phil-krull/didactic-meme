<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/dashboardShow.css"); ?>">
</head>
<body>
  <form action="/sessions/destroy" method="post">
    <button class="btn btn-primary btn-sm" type="submit">Logout</button>
  </form>
  <div class="container">
    <?php if ($this->session->flashdata('errors')) { ?>
      <p><span><?= $this->session->flashdata('errors') ?></span></p>
    <?php } ?>
    <h2>Manage Users</h2>
    <table class="table table-striped">
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Register Date</td>
        <td>User Level</td>
        <td>Actions</td>
      </tr>
      <?php if($users) { ?>
        <?php foreach ($users as $key => $value) { ?>
        <tr>
          <td><?= $value['id'] ?></td>
          <td><a href="/users/show/<?= $value['id'] ?>"><?= $value['first_name'] ?> <?= $value['last_name'] ?></a></td>
          <td><?= $value['email'] ?></td>
          <td><?= date("M d, Y", strtotime($value['created_at'])) ?></td>
          <td><?= $value['user_level'] ?></td>
          <td><a href="/admins/edit/<?= $value['id'] ?>">Edit</a> | <a href="/admins/destroy/<?= $value['id'] ?>">Remove</a></td>
        </tr>
         <?php } ?>
      <?php } ?>
    </table>
    <a class="addUser" href="/users/new">Add new User</a>
  </div><!-- end of container -->
</body>
</html>
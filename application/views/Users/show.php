<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/users/show.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
  <a href="/dashboard">Return Dashboard</a>
  <form action="/sessions/destroy" method="post">
    <button class="btn btn-primary btn-sm" type="submit">Logout</button>
  </form>
  <div class="container">
    <?php if ($this->session->flashdata('errors')) { ?>
      <p><span><?= $this->session->flashdata('errors') ?></span></p>
    <?php } ?>
    <h3><?= $user['first_name'] ?> <?= $user['last_name'] ?></h3>
    <table class="table">
      <tr>
        <td>Registered at:</td>
        <td><?= date("M d, Y", strtotime($user['created_at'])) ?></td>
      </tr>
      <tr>
        <td>User ID:</td>
        <td><?= $user['id'] ?></td>
      </tr>
      <tr>
        <td>Email address:</td>
        <td><?= $user['email'] ?></td>
      </tr>
      <tr>
        <td>Description:</td>
        <td><?= $user['description'] ?></td>
      </tr>
    </table>
    <div class="messages">
      <h3>Leave a message for <?= $user['first_name'] ?></h3>
      <form action="/messages/<?= $user['id'] ?>" method="post">
        <textarea name="content" placeholder="Leave a message....."></textarea>
        <span class="button"><button class="btn btn-primary btn-sm" type="submit">Post Message</button></span>
      </form>
    </div><!-- end of messages -->
    <?php if($messages) { ?>
      <?php foreach ($messages as $key => $value) { ?>
        <div class="posts">
          <p class="left"><a href="/users/show/<?= $value['users_id'] ?>"><?= $value['messager_first_name'] ?> <?= $value['messager_last_name'] ?></a> wrote:</p>
          <p class="right"><?= date("M d, Y", strtotime($value['created_at'])) ?></p>
          <h4><?= $value['message_content'] ?></h4>
            <ul>
              <?php if($posts) { ?>
                <?php for($idx = 0; $idx < sizeof($posts); $idx++) { ?>
                  <?php foreach ($posts[$idx] as $key => $value2) { ?>
                    <?php if($value2['message_id'] == $value['id']) { ?> 
                      <p class="left"><a href="/users/show/<?= $value['users_id'] ?>"><?= $value2['first_name'] ?> <?= $value2['last_name'] ?></a> wrote:</p>
                      <p class="right"><?= date("M d, Y", strtotime($value2['created_at'])) ?></p>
                      <h4><?= $value2['content'] ?></h4>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </ul>
          <form action="/posts/<?= $value['id'] ?>/<?= $value['message_user_id'] ?>" method="post">
            <textarea name="content" placeholder="Leave a comment...."></textarea>
            <span class="button"><button class="btn btn-primary btn-sm" type="submit">Post Comment</button></span>
          </form>
        </div><!-- end of posts -->
       <?php } ?>
    <?php } ?>
  </div><!-- end of container -->
</body>
</html>
<?php
  include_once 'includes/authentication.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style/new-member.css">
    <title>New Member</title>
  </head>
  <body>
    <header>
      <?php include 'navbar.php'; ?>
    </header>
    <section class="new-member">
      <h2>New Member</h2>
      <form action="includes/new-member.inc.php" method="POST">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname">
        <label for="phonenumber">Phone Number</label>
        <input type="text" name="phonenumber">
        <label for="join-date">Join date:</label>
        <input type="date" name="join-date">
        <label for="expire-date">Expire date:</label>
        <input type="date" name="expire-date">
        <label for="health">Health Declaration:</label>
        <input type="hidden" name="health">
        <input type="checkbox" id="health_dec" name="health_dc" value="Yes">
        <textarea name="paid" class="paid" cols="40" rows="10"></textarea>
        <button type="submit" name="submit" class="save-btn">Save</button>
      </form>
    </section>
  </body>
</html>
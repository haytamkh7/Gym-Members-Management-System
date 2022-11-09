<?php
  include_once 'includes/authentication.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style/members-style.css">
    <title>Members</title>
  </head>
  <body>
    <header>
      <?php include 'navbar.php'; ?>
    </header>
    <div class="members-info">
      <form action="" method="post">
      <div class="active_inactive">
          <button type="submit" name="all-users-btn" class="all-users-btn">All</button>
          <button type="submit" name="active-users-btn" class="active-users-btn">Active</button>
          <button type="submit" name="expired-users-btn" class="expired-users-btn">Expired</button>
      </div>
      </form>
      <section class="search-section">
        <form action="" method="GET">
          <input type="text" name="search" class="search-input" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>">
          <button type="submit" class="search-btn">Search</button>
        </form>
      </section>
      <table class="members-table">
        <thead>
          <tr>
            <th style="width: 1%" scope="col">No.</th>
            <th style="width: 2%" scope="col">First Name</th>
            <th style="width: 2%" scope="col">Last Name</th>
            <th style="width: 2%" scope="col">Phone</th>
            <th style="width: 2%" scope="col">Joined Date</th>
            <th style="width: 2%" scope="col">Expire Date</th>
            <th style="width: 2%" scope="col">Health Declaration</th>
            <th style="width: 7%" scope="col">Paid</th>
            <th style="width: 2%" scope="col">Edit</th>
            <th style="width: 2%" scope="col">Delete</th>
          </tr>
        </thead>
        <tbody> <?php
      if(isset($_GET['search']))
      {
        include_once 'includes/show-search-results.inc.php';
      }
      if(isset($_POST["active-users-btn"]))
      { ?>
      <p class="data-alert">Active Subscriptions:</p>
      <?php
      include_once 'includes/show-active-members.inc.php';
    }
    elseif (isset($_POST["expired-users-btn"]))
    { ?>
      <p class="data-alert">Expired Subscriptions:</p>
      <?php
      include_once 'includes/show-expired-members.inc.php';
    }
    elseif(isset($_POST["all-users-btn"]))
    {
      ?>
      <p class="data-alert">All Subscriptions:</p>
      <?php
      include_once 'includes/show-all-members.inc.php';
    }
    ?>
       </tbody>
      </table>
    </div>
  </body>
</html>
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
    <link rel="stylesheet" href="style/edit-style.css">
    <title>Edit User Info</title>
</head>
<body>
    
    <header>
      <?php include 'navbar.php'; ?>
    </header>
    <section class="edit-info">
    <h2>Edit Member</h2>
    <?php
if (isset($_GET["id"]))
{
    $userid = $_GET["id"];
    $query = "SELECT * FROM members WHERE id = '$userid'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0)
    {
        foreach ($query_run as $user)
        {
?>
            <form action="includes/update_user_info.inc.php" method="POST">
                <input type="hidden" name="userid" value="<?=$userid?>">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="" value="<?=$user["firstname"];?>">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="" value="<?=$user["lastname"]?>">
                <label for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="" value="<?=$user["phonenumber"]?>">
                <label for="joindate">Join Date</label>
                <input type="date" name="joindate" id="" value="<?=$user["joindate"]?>">
                <label for="expiredate">Expire Date</label>
                <input type="date" name="expiredate" id="" value="<?=$user["expiredate"]?>">
                <label for="health">Health:</label>
                <input type="hidden" name="health">
                <input type="checkbox" class="health_dec_checkbox" id="health_dec_checkbox" name="health_dec" value="Yes" <?php echo ($user['health_dec']=='Yes' ? 'checked' : '');?>>
                <label for="paid">Paid</label>
                <input type="text" name="paid" value="<?= $user["paid"] ?>"></textarea>
                <button type="submit" name="save" class="save-btn">Save</button>
            </form>
    </section>
    <?php
        }

    }
    else
    {
?>
    <h4>Record not found</h4>
    <?php
    }
}
?>
</body>
</html>

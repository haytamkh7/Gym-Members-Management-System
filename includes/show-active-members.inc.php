<?php
$current_date = date("Y-m-d");
$query = "SELECT * FROM members WHERE expiredate > '$current_date'  ORDER BY joindate";
$query_run = mysqli_query($conn, $query);
if(mysqli_num_rows($query_run) > 0)
      {
        $counter = 1;
        foreach ($query_run as $row)
        {
          ?> <tr>
            <td> <?= $counter; ?> </td>
            <?php $counter = $counter + 1; ?>
            <td> <?= $row["firstname"]; ?> </td>
            <td> <?= $row["lastname"]; ?> </td>
            <td> <?= $row["phonenumber"]; ?> </td>
            <td> <?= date('d/m/y', strtotime($row["joindate"])); ?> </td>
            <td> <?= date('d/m/y', strtotime($row["expiredate"])); ?> </td>
            <td> <?= $row["health_dec"]; ?></td>
            <td> <?= $row["paid"]; ?></td>
            <td>
              <button type="button" class="edit-btn">
                <a href="edit.php?id=<?=$row["id"];?>">Edit</a>
              </button>
            </td>
            <td>
              <form action="includes/delete-member.inc.php" method="POST">
                <button type="submit" name="delete-btn" value="<?=$row["id"];?>" class="delete-btn">Delete</button>
              </form>
            </td>
          </tr> <?php
        }
      }
      else
      { ?>
      <p class="empty-data-alert">No active users.</p>
      <?php
      }
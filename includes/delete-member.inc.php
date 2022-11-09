<?php
include 'authentication.inc.php';
?>
<?php
if(isset($_POST["delete-btn"])) {
    $userid = $_POST["delete-btn"];
    $query = "DELETE FROM members WHERE id = '$userid'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("location: ../members.php");
        exit(0);
    }
    else
    {
        echo "<p>Failed to delete.</p>";
        exit(0);
    }

}

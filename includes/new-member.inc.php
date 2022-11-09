<?php
include 'authentication.inc.php';
?>
<?php
if (isset($_POST["submit"]))
{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];
    $joindate = $_POST["join-date"];
    $expiredate = $_POST["expire-date"];
    $health_dec = $_POST["health_dc"];
    $paid = $_POST["paid"];

    require_once 'functions.inc.php';

    addNewMember($conn, $firstname, $lastname, $phonenumber, $joindate, $expiredate, $health_dec, $paid);

}
else
{
    header("location: ../index.php");
    exit();
}
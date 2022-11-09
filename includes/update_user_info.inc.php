<?php
    include 'authentication.inc.php';
?>
<?php
if(isset($_POST["save"])) 
{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];
    $joindate = $_POST["joindate"];
    $expiredate = $_POST["expiredate"];
    $userid = $_POST["userid"];
    $paid = $_POST["paid"];

    // Check if the 'health declaration' checkbox is checked or not
    $health_dec_to_db;
    if(isset($_POST["health_dec"]))
    {
        $health_dec_to_db = 'Yes';
    }
    else
    {
        $health_dec_to_db = 'No';
    }    

    require_once 'functions.inc.php';

    updateUserInfo($conn, $userid, $firstname, $lastname, $phonenumber, $joindate, $expiredate, $health_dec_to_db, $paid);
}
<?php
function emptyInput($username, $password)
{
    $res;
    if (empty($username) || empty($password))
    {
        $res = true;
    }
    else
    {
        $res = false;
    }
    return $res;
}

function userExists($conn, $username)
{
    $sql = "SELECT * FROM admins WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $password)
{
    $userExists = userExists($conn, $username);
    if ($userExists === false)
    {
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
    print_r($userExists);
    $pwd = $userExists["password"];
    print ($pwd);
    $checkPwd = strcmp($password, $pwd);

    if ($checkPwd !== 0)
    {
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
    else if ($checkPwd === 0)
    {
        session_start();
        $_SESSION["username"] = $userExists["username"];
        header("location: ../dashboard.php");
        exit();
    }
}

function updateUserInfo($conn, $userid, $firstname, $lastname, $phonenumber, $joindate, $expiredate, $health_dec, $paid)
{
    $query = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', phonenumber = '$phonenumber', joindate = '$joindate', expiredate = '$expiredate', health_dec = '$health_dec', paid = '$paid'
                WHERE id = '$userid'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run)
    {
        header("location: ../members.php");
        exit(0);
    }
    else
    {
        echo "<p>Failed.</p>";
    }
}

function addNewMember($conn, $firstname, $lastname, $phonenumber, $joindate, $expiredate, $health_dec, $paid)
{
    $health_dec_to_bd = 'Yes';
    if($health_dec !== 'Yes')
    {
        $health_dec_to_bd = 'No';
    }
    $query = "INSERT INTO members (firstname, lastname, phonenumber, joindate, expiredate, health_dec, paid) VALUES ('$firstname', '$lastname', '$phonenumber', '$joindate', '$expiredate', '$health_dec_to_bd', '$paid');";
    $query_run = mysqli_query($conn, $query);
    if ($query_run)
    {
        header("location: ../members.php");
        exit();
    }
    else
    {
        echo "<p>Failed.</p>";
    }
}
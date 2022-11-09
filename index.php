<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Yousef Fitness</title>
</head>
<body>
    <div class="login-info">
        <form action="includes/login.inc.php" class="login-form" method = "post">
            <h1>Yousef Fitness</h1>
            <label for="username">Username: </label>
            <input type="text" name="username" id="">
            <label for="pwd">Password: </label>
            <input type="password" name="pwd" id="">
            <button type="submit" name = "submit" class="login-btn">Login</button>
        </form>
    </div>

    <?php
        
    ?>

    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Empty data, try again.</p>";
            }
            else if($_GET["error"] == "stmtFailed") {
                echo "<p>Something went wrong.</p>";
            } else if($_GET["error"] == "usernameNotFound") {
                echo "<p>User not found.</p>";
            } else if($_GET["error"] == "wrongLogin") {
                echo "<p>Invalid data.</p>";
            }
        }
    ?>
</body>
</html>
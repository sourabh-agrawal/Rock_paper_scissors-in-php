<?php
    require("bootstrap.php");
    if (isset($_POST['cancel'])) {
        header("Location: index.php");
        return;
    }
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
    $failure = false;

    if (isset($_POST['who']) && isset($_POST['pass'])) {
        if( strlen($_POST['who']) <1 || strlen($_POST['pass']) <1){
            $failure = "Username and password are required";
        }else{
            $check = hash('md5', $salt.$_POST['pass']);
            if($check == $stored_hash){
                header("Location:game.php?name=".urlencode($_POST['who']));
                return;
            }else {
                $failure = "Incorrect password";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sourabh Agrawal rps</title>
        <style media="screen">
            table{
                margin: 20px;
                width: auto;
            }
            td{
                text-align: center;
                padding: 10px;
            }
            tr:hover {
                background-color: #f5f5f5;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h1>Please Log In</h1>
            <?php
                if ($failure!==false) {
                    echo "<p style='color:red;'>".htmlentities($failure)."</p>";
                }
            ?>
            <form class = "form" method="post">
                <table>
                    <tr>
                        <td><label for="username">User name</label></td>
                        <td><input type="text" name="who" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="pass" id="password"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Log In"></td>
                        <td><input type="submit" name="cancel" value="Cancel"></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>

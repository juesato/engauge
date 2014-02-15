<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (!isset($_POST["username"])) {
            printf("Please enter a username you idiot");
        }
        elseif (!isset($_POST["password"])) {
            printf("Enter a password");
        }
        elseif ($_POST["password"] != $_POST["confirmation"]) {
            printf("Passwords must match");
        }
        else {
            $wtf = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            if ($wtf === false) {
                echo("Sorry, user already exists");
                // print $wtf;
            }
            else {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                printf("Thanks for registering!");
            }
            // print $wtf;
        }
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
<html>
<a href="../templates/register_form.php">Register Form</a>
<!-- <html>
<h1>
    Thanks for signing up!
</h1>
</html> -->
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
        if (!isset($_POST["user_type"])) {
            printf("Please select what type of user you are");
        }
        else {
            // $wtf = query("INSERT INTO users (username, password) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
            $wtf = query("INSERT INTO users (username, user_type, password) VALUES(?, ?, ?)", $_POST["username"], $_POST["user_type"], $_POST["password"]);
            if ($wtf === false) {
                apologize("That username already exists");
                // print $wtf;
            }
            else {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                render("new_login_form.php", ["headertext" => "Thanks for registering!"]);
                //Render something here?
                //printf("Thanks for registering!");
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
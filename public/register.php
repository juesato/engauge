<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (0 == strlen($_POST["username"])) {
            apologize("Please enter a username you idiot");
        }
        elseif (0 == strlen($_POST["password"])) {
            apologize("Enter a password");
        }
        elseif ($_POST["password"] != $_POST["confirmation"]) {
            apologize("Passwords must match");
        }
        elseif (!isset($_POST["user_type"])) {
            apologize("Please select what type of user you are");
        }
        else {
            // $wtf = query("INSERT INTO users (username, password) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
            if (!isset($_POST["phone"])) {
                $wtf = query("INSERT INTO users (username, user_type, password) VALUES(?, ?, ?)", $_POST["username"], $_POST["user_type"], $_POST["password"]);
            }
            else {
                $wtf = query("INSERT INTO users (username, user_type, password, phone) VALUES(?, ?, ?, ?)", $_POST["username"], $_POST["user_type"], $_POST["password"], $_POST["phone"]);
            }

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
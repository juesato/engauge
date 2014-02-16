<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        echo (strlen($_POST["newclass"] ));
        if (strlen($_POST["newclass"]) <= 1)
        {
            apologize("Please enter a new class name.");
        }


        if (false !== query("INSERT INTO classes (prof, subject) VALUES (?, ?)", $_POST["professorname"], $_POST["newclass"]))    
        {
            redirect("../templates/class_list.php");
        }

        else
        {
            apologize("Your new class sucks");
        }


    }
    else
    {
        // else render form
        render("../templates/add_class_form.php", ["title" => "Lookup a stock"]);
    }

?>

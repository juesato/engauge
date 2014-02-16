<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        // dump($_POST["topic"] );
        echo (strlen($_POST["newclass"] ));
        if (strlen($_POST["newclass"]) <= 1)
        {
            apologize("Please enter a new class name.");
        }

        // if (!isset($_POST["question"]))
        // {
        //     apologize("Please enter a question.");
        // }

        //if (!isset($_SESSION["class_id"]))
        //{
        //    $_SESSION["class_id"] = 0;
        //    printf("BTW, you don't have a class id.");
        //}

        //$date = new DateTime();
        //$parse_date = $date->format('Y-m-d H:i:s');

        //$active = isset($_POST["inlineCheckbox1"]) && $_POST["inlineCheckbox1"] ? 1 : 0;
        //$user = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
        //$user = $user[0];


        //$profname = $user["username"];
        if (false !== query("INSERT INTO classes (prof, subject) VALUES (?, ?)", $_POST["professorname"], $_POST["newclass"]))    
        {
        //    printf("Class added to classes.");
        //    echo ("<a href=\"../templates/classroom.php?class_id={$_SESSION["id"]}\"> Return </a> to class");
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

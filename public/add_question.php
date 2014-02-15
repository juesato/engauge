<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (!isset($_POST["topic"]))
        {
            apologize("Please enter a topic.");
        }

        if (!isset($_POST["question"]))
        {
            apologize("Please enter a question.");
        }


        if (false !== query("INSERT INTO questions (class_id, asker_id, text, topic) VALUES (?, ?, ?, ?)", $_SESSION["class_id"], $_SESSION["id"], $_POST["question"], $_POST["topic"]))
        {
            printf("Question added.");
        }

        else
        {
            apologize("Your question sucks");
        }


    }
    else
    {
        // else render form
        render("../templates/add_question_form.php", ["title" => "Lookup a stock"]);
    }

?>

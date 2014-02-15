<?php
    // configuration
    require("../includes/config.php");

    $_SESSION["question_id"] = $_GET["question_id"];
    // if form was submitted;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (!isset($_POST["answer"]))
        {
            apologize("Please submit an answer.");
        }

        // if (!isset($_POST["question"]))
        // {
        //     apologize("Please enter a question.");
        // }

        if (!isset($_SESSION["question_id"]))
        {
            apologize("What question are you answering?");

            // $_SESSION["class_id"] = 0;
            // printf("BTW, you don't have a class id.");
        }

        $date = new DateTime();
        $parse_date = $date->format('Y-m-d H:i:s');



        if (false !== query("INSERT INTO answers (question_id, answerer_id, text, datetime) VALUES (?, ?, ?, ?)", $_SESSION["question_id"], $_SESSION["id"], $_POST["answer"], $parse_date))
        {
            printf("Answer added.");
        }

        else
        {
            apologize("You fucked up and clearly I didn't");
        }


    }
    else
    {
        // else render form
        render("../templates/add_answer_form.php", ["title" => "Answer a question"]);
    }

?>

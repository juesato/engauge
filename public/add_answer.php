<?php
    // configuration
    require("../includes/config.php");
    include("../NexmoPHP/NexmoMessage.php");

    $_SESSION["question_id"] = $_GET["question_id"];
    $qid = $_GET["question_id"];
    // if form was submitted;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        // $len = strlen($_POST["answer"]);
        // echo $len;
        // dump($_POST);
        if (!isset($_POST["answer"]) || strlen($_POST["answer"]) <= 1) 
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

        $active = isset($_POST["inlineCheckbox1"]) && $_POST["inlineCheckbox1"] ? 1 : 0;


        if (false !== query("INSERT INTO answers (question_id, answerer_id, text, datetime, anon) VALUES (?, ?, ?, ?, ?)", $_SESSION["question_id"], $_SESSION["id"], $_POST["answer"], $parse_date, $active))
        {
            printf("Answer added.\n");
            echo ("<a href=\"../templates/classroom.php?class_id={$_SESSION["id"]}\"> Return </a> to class");


            $q = query("SELECT * FROM questions WHERE id=?", $qid);
            $cur_q = $q[0];
            $u_id = $cur_q["asker_id"];
            $user = query("SELECT * FROM users WHERE id=  {$u_id}");
            $user = $user[0];
            $phone_num = $user["phone"];

            $question_text = $cur_q["topic"];
            if (strlen($question_text) > 15) {
                $question_text = substr($question_text, 0 , 15) . "...";
            }
            $answerer = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
            $answerer = $answerer[0];
            $answerer = $answerer["username"];
            $msg = $_POST["answer"];
            $final_msg = "Question: " . $question_text . "\n" . $answerer . " answers: " . $msg;

            if ($cur_q['phone_reply'] === 1) {
                    //include ( "../NexmoPHP/NexmoMessage.php" );
                    $intl_phone = '+' . $phone_num;
                    $nexmo_sms = new NexmoMessage('1c7512a7', 'd77fd951'); //login kaixiao2@gmail.com, password: aaaaaa
                    $info = $nexmo_sms->sendText( $intl_phone, '14844409618', $final_msg );
                    echo $nexmo_sms->displayOverview($info);
            }

            redirect("../templates/classroom.php?class_id={$_SESSION["class_id"]}");
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

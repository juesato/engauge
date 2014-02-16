<?php
    // configuration
    require("../includes/config.php");

    $qid = $_GET["question_id"];

    if (false !== query("UPDATE questions SET resolved=1 WHERE id=?" , $qid) )
    {
        echo (" Question $qid resolved");
        echo (" <a href=\"javascript:history.go(-1);\"> Return </a> to class ");
        redirect("../templates/classroom.php?class_id={$_SESSION["class_id"]}");
    }

    else
    {
        apologize("Unable to claim question");
    }

?>
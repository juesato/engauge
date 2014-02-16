<?php
    // configuration
    require("../includes/config.php");

    $qid = $_GET["question_id"];

    if (false !== query("UPDATE questions SET claimed=1 WHERE id=?" , $qid) )
    {
        echo (" Question $qid claimed");
        echo (" <a href=\"javascript:history.go(-1);\"> Return </a> to class ");
        redirect("../templates/classroom.php?class_id={$_SESSION["class_id"]}");
    }

    else
    {
        apologize("Unable to claim question");
    }

?>

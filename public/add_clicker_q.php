<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $class = $_GET["class_id"];

        if (!isset($_SESSION["class_id"]))
        {
            $_SESSION["class_id"] = 0;
            printf("BTW, you don't have a class id.");
        }

        if (false !== query("INSERT INTO clicker_qs (class_id, question, a, b, c, d) VALUES (?, ?, ?, ?, ?, ?)", $class, $_POST["q_text"], $_POST["ans_a"], $_POST['ans_b'], $_POST['ans_c'], $_POST['ans_d']) )
        {
            printf("Clicker question added to class {$class}.");
            echo ("<a href=\"../templates/classroom.php?class_id={$_SESSION["id"]}\"> Return </a> to class");
            redirect("../templates/classroom.php?class_id={$_SESSION["class_id"]}");
        }

        else
        {
            apologize("Your question sucks");
        }

    }
    else {
        javascript:history.go(-1);
    }
?>

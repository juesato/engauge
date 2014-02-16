<?php
    // configuration
    require("../includes/config.php");
redirect("../templates/classroom.php?class_id={$_SESSION["class_id"]}");

?>
<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (!isset($_POST["symbol"])) {
            printf("Please enter a ticker you idiot");
        }
        else {
            $s = lookup($_POST["symbol"]);
            if ($s["price"] <= 0) {
                apologize("Sorry, this stock could not be found");
            }
            else {
                print ("Price: " . $s["price"]);
            }
        }
    }
    else
    {
        // else render form
        render("../templates/quote_form.php", ["title" => "Lookup a stock"]);
    }

?>
<html>
<a href="../templates/quote_form.php">Look up another stock</a>
</html>

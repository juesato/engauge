<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio

    $rows = query("SELECT * FROM owned_stocks WHERE id = 4");

    $positions = [];
	foreach ($rows as $row)
	{
	    $stock = lookup($row["symbol"]);
	    if ($stock !== false)
	    {
	        $positions[] = [
	            "name" => $stock["name"],
	            "price" => $stock["price"],
	            "shares" => $row["shares"],
	            "symbol" => $row["symbol"]
	        ];
	    }
	}
	render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);

    // render("portfolio.php", ["title" => "Portfolio"]);

?>

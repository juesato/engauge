<?php

	include("../includes/config.php");

	$rows = query("SELECT * FROM classes");
	if ($rows !== false && count($rows) > 0) {
		foreach ($rows as $row) {
			print ($row["subject"]);
		}
	}
?>
<!DOCTYPE html>

<?php

	require("../includes/config.php");

	if (array_key_exists('class_id', $_GET)) {
		echo("You are currently in classroom {$_GET["class_id"]}.");
		$_SESSION['class_id'] = $_GET["class_id"];
	}

?>


<!-- <form action="../public/add_question.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="topic" placeholder="Topic" type="text"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="question" placeholder="Question" type="text"/>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </fieldset>
</form>
 -->
<html>
<body>


<link rel="stylesheet" href="../public/boot/bootstrap.css"  type="text/css/">
<link rel="stylesheet" href="../public/css/custom.css"  type="text/css/">

	<div class="container">

	      		<?php
					echo ("{$_SESSION['class_id']}");

					$rows = query("SELECT * FROM questions WHERE class_id=  {$_SESSION['class_id']} ");
					// dump($rows);
					if ($rows !== false && count($rows) > 0) {
						foreach($rows as $row) {

							echo("<div> Topic is {$row["topic"]} </div>");
							echo("<div> Question: {$row["text"]} </div>");
							// echo ("<tr><td>{$row["id"]}</td><td>{$row["subject"]}</td><td>{$row["prof"]}</td>");
							// $str = "<td><a href=\"classroom.php?class_id={$row["id"]}\" class=\"btn btn-success\">Enter Class</a></td>";
							// echo ( $str );
							// echo("</tr>");
						}
					}
				?>
		<!-- add question form -->
		<form action="../public/add_question.php" method="post">
		    <fieldset>
		        <div class="form-group col-lg-2">
		            <input autofocus class="form-control width-full" name="topic" placeholder="Post Question Here" type="text"/>
		        </div>

		        <div class="form-group">
		            <!-- <input class="form-control" name="question" placeholder="Question" type="text"/> -->
		            <textarea class="form-control width-full" rows="8" name="question" /> </textarea>

		        </div>
		        <div>
					<label class="checkbox-inline">
					  <input type="checkbox" id="inlineCheckbox1" value="anon"> Post Anonymously
					</label>
				</div>

		        <div class="form-group">
		            <button type="submit" class="btn btn-success">Submit</button>
		        </div>
		    </fieldset>
		</form>

	</div>1

</body>
</html>
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

<link rel="stylesheet" href="../public/css/bootstrap.css" type="text/css/">
<link rel="stylesheet" href="../public/boot/bootstrap.css"  type="text/css/">
<link rel="stylesheet" href="../public/css/custom.css"  type="text/css/">

<script src="../public/js/jquery-1.10.2.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script>
// var bootstrap_enabled = (typeof $().modal == 'function');
// console.log("TEST");
// console.log(bootstrap_enabled);
</script>


<div class="container">  
	<?php
		$rows = query("SELECT * FROM questions WHERE class_id=  {$_SESSION['class_id']} ");
		// dump($rows);
		if ($rows !== false && count($rows) > 0) {
			foreach($rows as $row) {

				// echo("<div> Topic is {$row["topic"]} </div>");
				// echo("<div> Question: {$row["text"]} </div>");

				$answers = query("SELECT * FROM answers WHERE question_id={$row["id"]} ");

				$num_ans = count($answers);


				echo ( "
					<div class=\"panel-group\" id=\"accordion\">
					  <div class=\"panel panel-default\">

					    <div class=\"panel-heading\">
					      <h4 class=\"panel-title\">
					        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$row['id']}\">
					          {$row["topic"]}
					        </a>
					      </h4>
					    </div>

					    <div id=\"collapse{$row['id']}\" class=\"panel-collapse collapse\">
					      <div class=\"panel-body\">
					      	{$row["text"]}
				      	  </div> 
				      	  <div class=\"pad15\">
							<button type=\"button\" class=\"btn btn-mini btn-info\" data-toggle=\"collapse\" data-target=\".ans{$row["id"]}\">
							  Show {$num_ans} Answers
							</button>
						  </div>
					    </div>

					  </div>
					"
				);
				if ($answers !== false && count($answers) > 0) {
					foreach ($answers as $answer) {
						echo ( "<div class=\"ans{$row["id"]}\" class=\"collapse in\">
								blahblah
								{$answer["text"]}
							  </div>"
						);	  
					}
				}
				echo("</div>");

				
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
</div>

</body>
</html>
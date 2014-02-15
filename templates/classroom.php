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

	<div class="container">


<script>
// var bootstrap_enabled = (typeof $().modal == 'function');
// console.log("TEST");
// console.log(bootstrap_enabled);
</script>


<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          eugenesucks123
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>


	<button type="button" class="btn btn-mini btn-info" data-toggle="collapse" data-target="#demo">
	  Show Answers
	</button>

	<div id="demo" class="collapse">abracadabra</div>


    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          jon is the best.
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
  
	      		<?php
					$rows = query("SELECT * FROM questions WHERE class_id=  {$_SESSION['class_id']} ");
					// dump($rows);
					if ($rows !== false && count($rows) > 0) {
						foreach($rows as $row) {
							// echo ( "
							// 	<div class=\"panel-group\" id=\"accordion\">
							// 	  <div class=\"panel panel-default\">
							// 	    <div class=\"panel-heading\">
							// 	      <h4 class=\"panel-title\">
							// 	        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$row['id']}\">
							// 	          jon is the best.
							// 	        </a>
							// 	      </h4>
							// 	    </div>
							// 	    <div id="collapseTwo" class="panel-collapse collapse in">
							// 	      <div class="panel-body">
							// 	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							// 	      </div>
							// 	    </div>
							// 	  </div>
							// 	</div> "

							// )

							echo("<div> Topic is {$row["topic"]} </div>");
							echo("<div> Question: {$row["text"]} </div>");
							// echo ("<tr><td>{$row["id"]}</td><td>{$row["subject"]}</td><td>{$row["prof"]}</td>");
							// $str = "<td><a href=\"classroom.php?class_id={$row["id"]}\" class=\"btn btn-success\">Enter Class</a></td>";
							// echo ( $str );
							// echo("</tr>");
							$answers = query("SELECT * FROM answers WHERE question_id={$row["id"]} ");
							if ($answers !== false && count($answers) > 0) {
								foreach ($answers as $answer) {
									echo(" <div> Answer: {$answer["text"]} </div> ");
								}
							}
						}
					}
				?>
		<!-- add question form -->
		<?php
			// echo ($_SESSION['class_id']);
		?>
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

	</div>

</body>
</html>
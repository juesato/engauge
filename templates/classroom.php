<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../public/boot/favicon.ico">

    <title>Welcome to the classroom!</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/background_login_register.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <script src="../public/js/bootstrap.js"></script>

  </head>

<?php
	//echo ("CHECK");
	include("../NexmoPHP/NexmoAccount.php");
	include("../NexmoPHP/NexmoReceipt.php");
	include("../NexmoPHP/NexmoMessage.php");

	$sms = new NexmoMessage('1c7512a7', 'd77fd951');

	$tmp = $sms->inboundText();
	if ($tmp === false) {
		//echo ("WHOA");
	}
	//echo ("Huh $tmp");

    if ($sms->inboundText()) {
         $sms->reply('You said: ' . $sms->text);
    }
?>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php

			require("../includes/config.php");

			if (array_key_exists('class_id', $_GET)) {
				$_SESSION['class_id'] = $_GET["class_id"];
			}

            $classes = query("SELECT * FROM classes WHERE id =  {$_SESSION['class_id']} ");
            $class = $classes[0];
            $subj = $class["subject"];
			echo("<a class='navbar-brand' href='#'>Classroom {$_GET['class_id']}: $subj</a>");


			?>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

              <!--<li class="active"><a href="#">Class List</a></li>
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<a class="btn btn-lg btn-primary" href="../templates/class_list.php" role="button">Back to Class List &raquo;</a>
            	<a class="btn btn-lg btn-danger" href="../public/logout.php">Logout</a>
              <!--<li class="active"><a href="./">Default</a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>-->	
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
    <?php
    	//Testing for general confusion level of the class.
    	//Have a count of unanswered questions.
		$user = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
		$user = $user[0];

		if ($user["user_type"] === 'TA' || $user["user_type"] === "professor") {
        	$num_unanswered = 0;
        	$rows = query("SELECT * FROM questions WHERE class_id=  {$_SESSION['class_id']} ");
        	if ($rows !== false && count($rows) > 0) {
				foreach($rows as $row) {
        			$answs = query("SELECT * FROM answers WHERE question_id=  {$row['id']} ");
        			if (count($answs) === 0) {
        				$num_unanswered= $num_unanswered+1;
        			}
				}
			}
			if ($num_unanswered < 1) {
				echo ("
					<div class='alert alert-success'>
					<strong>Nice!</strong> No students are confused.
					</div>
				");
			}
			elseif ($num_unanswered < 2) {
				echo ("						
					<div class='alert alert-info'>
					<strong>Nice!</strong> Only {$num_unanswered} student is confused.
					</div>
					");
			}
			elseif ($num_unanswered < 4) {
				echo ("						
					<div class='alert alert-info'>
					<strong>Nice!</strong> Only {$num_unanswered} students are confused.
					</div>
					");
			}
			elseif ($num_unanswered < 8) {
				echo ("						
					<div class='alert alert-warning'>
					<strong>Warning!</strong> {$num_unanswered} students are confused.
					</div>
					");
			}
			else {
				echo ("						
					<div class='alert alert-danger'>
					<strong>Danger!</strong> {$num_unanswered} students are confused!
					</div>
					");
			}
		}
		else {
			echo ("
				<div class = 'pad15-tb'><h1>Current Questions</h1></div>       
			");
		}
    ?>

</div> <!-- /container -->

<link rel="stylesheet" href="../public/css/bootstrap.css" type="text/css/">
<link rel="stylesheet" href="../public/boot/bootstrap.css"  type="text/css/">
<link rel="stylesheet" href="../public/css/custom.css"  type="text/css/">

<script src="../public/js/jquery-1.10.2.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script>
</script>

<div class = "container">
	<?php
		$rows = query("SELECT * FROM questions WHERE class_id=  {$_SESSION['class_id']} ");
		// dump($rows);
//		$user = query("SELECT * FROM users WHERE id=  {$_SESSION['id']} ");
//		$user = $user[0];


		if ($rows !== false && count($rows) > 0) {
			foreach($rows as $row) {

				$asker_id = $row["asker_id"];
				$user = query("SELECT * FROM users WHERE id=  {$asker_id}");
				$user = $user[0];

				// echo("<div> Topic is {$row["topic"]} </div>");
				// echo("<div> Question: {$row["text"]} </div>");

				$answers = query("SELECT * FROM answers WHERE question_id={$row["id"]} ");

				$num_ans = count($answers);
				$question_datetime = $row["datetime"];

				$username = $row["anon"] ? "Anonymous" : $user["username"];

//Testing if a professor or TA has addressed it.
				// foreach($answers as $ans) {
				// 	$ans_id = $ans["answerer_id"];
				// 	$user = query("SELECT * FROM users WHERE id=  {$ans_id}");
				// 	$user = $user[0];

				// 	if ($user["user_type"])
				// }

				if ($row["claimed"] === 1) {
					$claim_status = "claimed";
				}
				else {
					$claim_status = "no"; //this isn't actually a css class
				}
				if ($row["resolved"] === 1) {
					$resolve_status = "resolved";
				}
				else {
					$resolve_status = "no";
				}

				echo ( "
				<div class=\"panel-group \" id=\"accordion\">
					<div class=\"panel panel-default\">
						
						<div class=\"panel-heading\">
							<h4 class=\"panel-title\">
							<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$row['id']}\">
								<div class=\"row\">
									<div class=\"col-md-8 {$claim_status} {$resolve_status}\">{$row["topic"]}</div>
									<div class=\"col-md-4-special\">{$username}</div>
									<div class=\"col-md-2-special\">{$question_datetime}</div>

								</div>
							</a>
							</h4>
						</div>
							
						<div id=\"collapse{$row['id']}\" class=\"panel-collapse collapse\">
							<div class=\"panel-body\">
				    			{$row["text"]}
			      			</div> 
			      		
				      		<div class=\"pad15\">
							<button type=\"button\" class=\"btn btn-mini btn-primary\" data-toggle=\"collapse\" data-parent='#answer_accordion' href='#ans{$row["id"]}'>
								Show {$num_ans} Answers
							</button> "
				) ;

				$user = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
				$user = $user[0];
				if ($user["user_type"] === 'TA' || $user["user_type"] === "professor" ) {
					echo ("
							<a href=\"../public/ta_claim.php?question_id={$row["id"]}\"> 
								<button type=\"button\" class=\"btn btn-mini btn-info\" >
									Claim for Answer
								</button>
							</a>
					");
				}
				if ($user["id"] === $row["asker_id"]) {
					echo ("
							<a href=\"../public/mark_resolved.php?question_id={$row["id"]}\"> 
								<button type=\"button\" class=\"btn btn-mini btn-success\" >
									Question resolved
								</button>
							</a>
					");
				}
				echo ( "
							</div>

							<div class=\"pad15\">

							</div>
							

							<div class=\"panel-group\" id='answer_accordion'>
								<div id=\"ans{$row["id"]}\" class=\"panel-collapse collapse\">

					"
				);



				if ($answers !== false && count($answers) > 0) {
					foreach ($answers as $answer) {
						$answerer_id = $answer["answerer_id"];
						$answerer = query("SELECT * FROM users WHERE id=  {$answerer_id}");
						$answerer = $answerer[0];

						$answerer_name = $answer["anon"] ? "Anonymous" : $answerer["username"];

						echo ( "
							<div class=\"panel-body\">
								<div class='media'>
								<a class='pull-left' href='#'>
									<img class='media-object img-circle' src='../public/img/cool_logo.jpg' alt='Alternative text yay'>
								</a>
									<div class='media-body'>
										<h4 class=\"media-heading\">
										<div class=\"special_row\">
											{$answerer_name}
											<div class=\"col-md-4-super_special\">
												{$question_datetime}
											</div>
										</div>
										 </h4>
										<div class=\"pad15-left\">
										{$answer["text"]}
										</div>
									</div>
								</div>
					      	  </div>
					    	"
						);	  
					}	
				}
				echo ( "</div></div>");

				echo ( "
				<div class=\"collapse{$row['id']}\" class=\"panel-collapse collapse\">
					<div class=\"panel-body\">
					<form action=\"../public/add_answer.php?question_id={$row["id"]}\" method=\"post\">
						<fieldset>
						<div class=\"form-group\">
							<textarea class=\"form-control width-full\" rows=\"5\" name=\"answer\" placeholder=\"Post Answer Here\"/></textarea>
						</div>
						<div class=\"form-group\">
							<button type=\"submit\" class=\"btn btn-success\">Add Answer</button>
							<label class=\"checkbox-inline\">
							<input type=\"checkbox\" name=\"inlineCheckbox1\" value=\"anon\"> Post Anonymously
							</label>
						</div>
						</fieldset>
					</form>
					</div>
				</div>
				");
				// close divs!
				echo("</div></div></div>");

				
			}
		}
	?>

	<hr>
	<!-- add question form -->
</div>
	<div class = "container">  

	<div> <h2> Add a Question </h2> </div>
	<form action="../public/add_question.php" method="post">
	    <fieldset>
	        <div class="form-group">
	            <input autofocus class="form-control width-full" name="topic" placeholder="Question Topic" type="text"/>
	        </div>

	        <div class="form-group">
	            <textarea class="form-control width-full" rows="8" name="question" placeholder="Post Question Here"/></textarea>
	        </div>

	        <div class="form-group">
	            <button type="submit" class="btn btn-success">Submit</button>
	            <label class="checkbox-inline">
				  <input type="checkbox" name="inlineCheckbox1" value="anon" class = "cream"> Post Anonymously
				</label>

	        </div>
	    </fieldset>
	</form>
</div>
</body>
</html>
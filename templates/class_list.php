
<!DOCTYPE html>

<?php
	require("../includes/config.php");
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Engauged</title>
	</head>
	<link rel="stylesheet" href="../public/boot/bootstrap.css"  type="text/css/">
	<link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/background_login_register.css" rel="stylesheet">


	<body>
	<div class="container">

		<div class="navbar">
        	<div class="navbar-inner">
        		<div class="container">
                  <ul class="nav">
                    <li><a href="#">EnGauge</a></li>
                  </ul>
	              <ul class="nav navbar-nav navbar-right">
	                <li><a href="../public/logout.php">Logout</a></li>
	              </ul>
                </div>
            </div>

        </div>


        <div class="hero-unit">
    	<h1>Be EnGauged!</h1>

    	<p>Stay up to speed in lectures by asking TA's and classmates questions through our online platform. Or help out your fellow students by answering their questions!</p>
 		</div>

		<hr>

		<div>
		<table class="table table-striped table-hover">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Class Subject</th>
	          <th>Abbreviation</th>
	          <th>Professor</th>
	          <th> </th>
	        </tr>
	      </thead>
	      <tbody>
	      		<?php
					// require("../includes/config.php");

					$rows = query("SELECT * FROM classes");

					if ($rows !== false && count($rows) > 0) {
						foreach($rows as $row) {
							echo ("<tr><td>{$row["id"]}</td><td>{$row["subject"]}</td><td>{$row["abbrev"]}</td><td>{$row["prof"]}</td>");
							$str = "<td><a href=\"classroom.php?class_id={$row["id"]}\" class=\"btn btn-success\">Enter Class</a></td>";
							echo ( $str );
							echo("</tr>");
						}
					}

				?>
	      </tbody>
	    </table>

<?php
					$user = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
					$user = $user[0];

					if ($user["user_type"]==="professor") {
						echo("
							<hr>
							<form action='../public/add_class.php' method='post'>
								<fieldset>
								<div class='form-group span7'>
									<textarea rows='1' autofocus class='form-control' name='newclass' placeholder='Post New Class Here' type='text'/></textarea>
								</div>
								<div class='form-group span4'>
									<textarea rows='1' class='form-control' name='abbreviation' placeholder='Abbreviation' type='text'/></textarea>
								</div>
								<div class='form-group span7'>
									<textarea rows='1' class='form-control' name='professorname' placeholder='Professor Name' type='text'/></textarea>
								</div>
								<div class='form-group span4'>
									<button type='submit' class='btn btn-md btn-primary btn-block'>Add Class</button>
								</div>
								</fieldset>
							</form>
						");
					}
?>
		</div>

    </div>

		<script src="../public/js/bootstrap.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	</body>
</html>


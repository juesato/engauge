
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
    	<h1>Get EnGauged!</h1>

    	<p>Stay up to speed in lectures by asking TA's and classmates through our online platform. Or help out a fellow students by answering their questions!</p>
 		</div>

		<hr>

		<div>
		<table class="table table-striped table-hover">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Class Subject</th>
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
							echo ("<tr><td>{$row["id"]}</td><td>{$row["subject"]}</td><td>{$row["prof"]}</td>");
							$str = "<td><a href=\"classroom.php?class_id={$row["id"]}\" class=\"btn btn-success\">Enter Class</a></td>";
							echo ( $str );
							echo("</tr>");
						}
					}

					$user = query("SELECT * FROM users WHERE id=  {$_SESSION["id"]}");
					$user = $user[0];

					if ($user["user_type"]==="professor") {
						echo("
						<div class = 'container'>
							<form action='../public/add_class.php' method='post'>
								<fieldset>
								<div class='form-group'>
									<input autofocus class='form-control width-full' name='newclass' placeholder='Post New Class Here' type='text'/>
								</div>
								</fieldset>
							</form>
						</div>
						");
					}
				?>
	      </tbody>
	    </table>


		</div>

    </div>

		<script src="../public/js/bootstrap.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	</body>
</html>


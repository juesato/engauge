
<!DOCTYPE html>

<?php
	require("../includes/config.php");
	if (array_key_exists('class_id', $_GET)) {

		$class_id = $_GET['class_id'];
		echo $class_id;

		// if ($class_id > 0) {
		// 	redirect("classroom.php");
		// }		
	}


?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Engage </title>
	</head>
	<link rel="stylesheet" href="../public/boot/bootstrap.css"  type="text/css/">



	<body>
	<div class="container">

		<h1><a href="#">Engage</a></h1>

		<div class="navbar">
        	<div class="navbar-inner">
        		<div class="container">
                  <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Classes</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>
            </div>
        </div>


        <div class="hero-unit">
    	<h1>Marketing stuff!</h1>

    	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
 
	    <a href="#" class="btn btn-large btn-success">Get Started</a>
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
							$str = "<td><a href=\"?class_id={$row["id"]}\" class=\"btn btn-success\">Enter Class</a></td>";
							echo ( $str );
							echo("</tr>");
						}
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


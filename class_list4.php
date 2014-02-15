
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>My First Bootstrap project </title>
	</head>
	<link rel="stylesheet" href="./public/boot/bootstrap.css"  type="text/css/">



	<body>
	<div class="container">

		<h1><a href="#">Bootstrap Site</a></h1>

		<div class="navbar">
        	<div class="navbar-inner">
        		<div class="container">
                  <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>
            </div>

            <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-th-large"></i> Drop Down
        <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <li><a href="#">Item1</a></li>
        <li><a href="#">Item2</a></li>
        <li><a href="#">Item3</a></li>
    </ul>
</li>
        </div>

        <div class="hero-unit">
    	<h1>Marketing stuff!</h1>

    	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
 
	    <a href="#" class="btn btn-large btn-success">Get Started</a>
		</div>

		<hr>
		<div class="row">
          <div class="span8">
            <ul class="nav nav-list">
            	<li class="nav-header">Subjects</li>

				<?php
					// require("../includes/config.php");

					$rows = query("SELECT * FROM classes");

					if ($rows !== false && count($rows) > 0) {
						foreach($rows as $row) {
							echo ("<li><a href='#'> {$row["subject"]} </a></li>");
						}
					}
				?>
			    <li class="active"><a href="#">Home</a></li>
			    <li><a href="#">Our Clients</a></li>
			    <li><a href="#">Our Services</a></li>
			    <li><a href="#">About Us</a></li>
			    <li><a href="#">Contact Us</a></li>
			    <li class="nav-header">Our Friends</li>
			    <li><a href="#">Google</a></li>
			    <li><a href="#">Yahoo!</a></li>
			    <li><a href="#">Bing</a></li>
			    <li><a href="#">Microsoft</a></li>
			    <li><a href="#">Gadgetic World</a></li>
			</ul>
          </div>
          <div class="span4">


    </div>



		<script src="public/js/bootstrap.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	</body>
</html>


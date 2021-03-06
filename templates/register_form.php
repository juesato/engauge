<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../public/boot/favicon.ico">

        <title>EnGauge - Registration</title>

        <!-- Bootstrap core CSS -->
        <link href="../public/boot/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/register.css" rel="stylesheet">
        <link href="../public/css/background_login_register.css" rel="stylesheet">
        <link href="../public/css/legit_login.css" rel="stylesheet">

        <h1 class = "center">EnGauge</h1>

        <hr size = "18px">
    </head>

    <body>
        <div class = "container">
            <div class = "padtop">
                <form class = "form-register" role = "form" action="../public/register.php" method="POST">
                   
                    <h3 class="form-signin-heading">Register an Account</h3>
                    <fieldset>
                        <div class="form-group">
                            <input autofocus class="form-control" name="username" placeholder="*Username" type="text"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" placeholder="*Password" type="password"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="confirmation" placeholder="*Password again" type="password"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phone" placeholder="Phone: ##########" type="text"/>
                        </div>
                        <div class="form-radio">
                            <input type="radio" name="user_type" value="student"> Student
                            <input type="radio" name="user_type" value="TA"> TA
                            <input type="radio" name="user_type" value="professor"> Professor
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Register Now!</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class = "footer-register">
            or <a href="../public/login.php">Log In</a>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../public/boot/favicon.ico">

        <title>EnGauge - Signin</title>

        <!-- Bootstrap core CSS -->
        <link href="../public/boot/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/signin.css" rel="stylesheet">
        <link href="../public/css/background_login_register.css" rel="stylesheet">
        <link href="../public/css/legit_login.css" rel="stylesheet">
        <h1 class = "center"> EnGauge </h1>
        <hr size = "18px">
    </head>
    <body>
        <div class = "container">
            <div class = "padtop">
                <form class="form-signin" role="form" action="../public/login.php" method="post">
                    <h3 class="form-signin-heading">Please Sign In</h3>
                    <fieldset>
                        <div class="form-group">
                            <input autofocus class="form-control" name="username" placeholder="Username" type="username"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" placeholder="Password" type="password"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Log In</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class = "footer-signin">
            or <a href="../public/register.php">Register</a> for an account
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../public/boot/favicon.ico">

        <title>Register an account</title>

        <!-- Bootstrap core CSS -->
        <link href="../public/boot/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/register.css" rel="stylesheet">
    </head>

    <body>
        <div class = "container">
            <form class = "form-register" role = "form" action="../public/register.php" method="post">
                <h2 class="form-register-heading">Register Now!</h2>
                <fieldset>
                    <div class="form-group">
                        <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" placeholder="Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="confirmation" placeholder="Password again" type="confirmation"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Register Now!</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class = "footer-register">
            or <a href="../public/login.php">Log In</a>
        </div>
    </body>
</html>

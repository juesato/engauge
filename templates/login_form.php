<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../public/boot/favicon.ico">

        <title>Log In</title>

        <!-- Bootstrap core CSS -->
        <link href="../public/boot/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/register.css" rel="stylesheet">
        <link href="../public/css/background_login_register.css" rel="stylesheet">

    </head>
    <body>
    <form action="../public/login.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="password" placeholder="Password" type="password"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Log In</button>
            </div>
        </fieldset>
    </form>
    <div>
        or <a href="../public/register.php">register</a> for an account
    </div>
    </body>

</html>
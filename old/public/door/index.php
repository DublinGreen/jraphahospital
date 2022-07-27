<?php require_once '../../MODELS/initialize.php'; ?>
<?php Utility::visitorPass("dashboard.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <meta name="description" content="">
        <meta name="author" content="">-->
        <link rel="shortcut icon" href="../VIEWS/asserts/b1229/assets/ico/fav.png">

        <title>Bespoke</title>

        <!-- Bootstrap core CSS -->
        <link href="../VIEWS/asserts/b1229/dist/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../VIEWS/asserts/b1229/assets/js/html5shiv.js"></script>
          <script src="../VIEWS/asserts/b1229/assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <form action="../CONTROLLERS/login.php" method="post" class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="email" name="email" class="form-control" required placeholder="Email address" autofocus>
                <input type="password" name="password" required class="form-control" placeholder="Password">
                <?php
                if (isset($_GET['login']) && $_GET['login'] == 0) {
                    echo("<p class ='alert-danger'>Login Combination Incorrect.</p>");
                }elseif (isset($_GET['login']) && $_GET['login'] == 3) {
                    echo("<p class ='alert-warning'>Sorry but you must sign in.</p>");
               }
                ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <br/><a href="../index.php">Back to Site</a>
            </form>
        </div> <!-- /container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./style/home.css">
        <?php 
            session_start();
            if (!isset($_SESSION['user'])) {
                header('Location: index.php');
                session_destroy();
            } else {
                echo "Welcome back, " . $_SESSION['user'];
            }
        ?>
    </head>
    <body>

    </body>
</html>
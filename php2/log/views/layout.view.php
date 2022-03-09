<!DOCTYPE html>
<html>
<head>
<title> PHP Teoria: <?= $view_bag['title']; ?> </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
</head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">PHP Teoria: <?= $view_bag['title']; ?></a>
        </div>
    </nav>

    <!-- content here -->
    <?php require("$name.view.php"); ?>

    </body>
</html>
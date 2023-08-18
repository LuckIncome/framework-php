<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php \fw\core\base\View::getMeta(); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="container">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="/admin" class="nav-link">Admin</a>
            </li>
            <li class="nav-item">
                <a href="/user/signup" class="nav-link">SignUp</a>
            </li>
            <li class="nav-item">
                <a href="/user/login" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="/user/logout" class="nav-link">Logout</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <?php if(!empty($menu)) {?>
                        <?php foreach ($menu as $list) {?>
                            <a class="flex-sm-fill text-sm-center nav-link" href="#"><?php echo $list->title; ?></a>
                        <?php }?>
                    <?php }?>
                </nav>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['error'])) {?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['success'])) {?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php } ?>
    <?php echo $content; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
</body>
</html>
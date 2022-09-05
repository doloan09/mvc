
<?php //require_once __DIR__ . '/../inc/header.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="/doLogin" method="post">
        Name: <br>
        <input type="text" name="name" required><br>
        Pass: <br>
        <input type="password" name="pass" required><br>

        <input type="submit" name="login" value="Login"><br>

    </form>
<!---->
<!--    --><?php
//        $pattern = '/user/';
//        $string = 'http://lab_mvc.test/user';
//        preg_match($pattern, $string, $matches);
//        echo '<pre>';
//        print_r($matches);
//        echo '</pre>';
//    ?>
<!---->
<!--    --><?php
//        $route = preg_replace('/\//', '\\/', "/update/{id}/{per}");
//        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-0-9]+)', $route);
//        $route = '/^' . $route . '$/i';
//        echo $route;
//    ?>
<!--    <br>-->
<!--    --><?php
//        echo parse_url("https://chuanseoweb.com/wordpress-development/", PHP_URL_PATH);
//    ?>
<!---->
<!--    <br>-->
<!--    --><?php
//        if (preg_match('/A/', 'THEHALFHART', $maches)){
//            var_dump($maches);
//        }
//        echo str_replace(' ', '', ucwords(str_replace('-', ' ', "pots-part")));
//    ?>
<!---->
<!--    --><?php
//    $pattern = '/@(.+)m/';
//    $string = 'thanhtaivtt@gmail.com,';
//    preg_match($pattern, $string, $matches);
//    echo '<pre>';
//    print_r($matches);
//    echo '</pre>'; ?>

</body>
</html>
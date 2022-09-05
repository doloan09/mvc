
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
    <?php
        if ($_COOKIE['permission'] == 1){
            $str = " admin " . $_COOKIE['name'];
            $Listuser = '<a href="/users">List User</a>';
            $update = '';
        }else{
            $str = $_COOKIE['name'];
            $Listuser = "";
            $update = '<a href="/users/edit/'. $_COOKIE['id'] .'" >Update</a>';
        }
    ?>
    <h1>Xin chao <?php echo  $str?></h1>
    <p>Name: <?php echo $_COOKIE['name']?></p>
    <p>Pass: <?php echo $_COOKIE['pass']?></p>
    <p>Address: <?php echo $_COOKIE['address']?></p>

    <a href="/logout">Log out</a>
    <?php
        echo $update;
    ?>
    <?php
        echo $Listuser;
    ?>
</body>
</html>
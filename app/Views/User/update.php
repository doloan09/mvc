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
    <h1>Update User</h1>
    <form action="/update/<?php echo $item['id']?>/<?php echo $item['permission']?>" method="post">
        <p type="text" name="name">Name: <?php echo $item['name']?></p>
        Pass: <br>
        <input type="text" name="pass" value="<?php echo $item['pass']?>"><br>
        Address: <br>
        <input type="text" name="address" value="<?php echo $item['address']?>"><br>

        <input type="submit" value="Update"><br>
    </form>
</body>
</html>
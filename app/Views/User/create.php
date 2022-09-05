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
    <h1>Register User</h1>
    <form action="/user" method="post">
        Name: <br>
        <input type="text" name="name" required><br>
        Pass: <br>
        <input type="password" name="pass" required><br>
        Address: <br>
        <input type="text" name="address" required><br>

        <input type="submit" name="add" value="Register"><br>

    </form>
</body>
</html>
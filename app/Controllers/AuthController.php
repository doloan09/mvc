<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        View::render('User/login.php');
    }

    public function doLogin()
    {
        if (isset($_POST["login"])) {
            $name = $_POST['name'];
            $pass = $_POST['pass'];

            $user = new User();

            $data = $user->checkLogin($name, md5($pass));

            if ($data) {
                setcookie('id', $data['id'], time() + 600, "/");
                setcookie('name', $data['name'], time() + 600, "/");
                setcookie('pass', $data['pass'], time() + 600, "/");
                setcookie('address', $data['address'], time() + 600, "/");
                setcookie('permission', $data['permission'], time() + 600, "/");

                header('Location: /user/info');
            } else {
                header('Location: /login');
            }
        }
    }

    public function logout()
    {
        setcookie("id", "", time() - 3600);
        setcookie("name", "", time() - 3600);
        setcookie("pass", "", time() - 3600);
        setcookie("address", "", time() - 3600);
        setcookie("permission", "", time() - 3600);

        header('Location: /login');
    }
}
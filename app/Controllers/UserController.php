<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User;

class UserController extends Controller
{
 // hien thi danh sach user
    public function index()
    {
        $check = $this->checkLoginCookie();

        if ($check) {
            if ($check['permission'] == 1) {
                $user = new User();

                $listUser = $user->getAll();
                View::render('welcome.php', compact('listUser'));
            }else{
                header('Location: /login');
            }
        } else {
            header('Location: /login');
        }
    }

    //hien thi thong tin user vua dang nhap
    public function show(){
        $user = $this->checkLoginCookie();
        if ($user) {
            View::render('User/info.php');
        } else {
            header('Location: /login');
        }
    }

    //hien thi form create user (register)
    public function create()
    {
        View::render('User/create.php');
    }

    // insert 1 user
    public function store()
    {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $address = $_POST['address'];
        $permission = 0;

        if ($name == "" || $pass == "" || $address == "") {
            echo 'Vui long nhap du thong tin!';
        } else {
            $user = array(
                'name' => $name,
                'pass' => $pass,
                'address' => $address,
                'permission' => $permission
            );
            $userModel = new User();

            $stt = $userModel->checkAccount($name); //kiem tra xem tai khoan da ton tai chua

            if($stt){
                echo "Tai khoan da ton tai";
//                /// -> chuyen sang trang login hoac info
            }else {
                $status = $userModel->addUser($user);

                if ($status) {
                    if (isset($_COOKIE['permission']) && $_COOKIE['permission'] == 1) {
                        header("Location: /users");
                    }else{
//                        header("Location: /login");
                        echo 'ban khong co quyen thuc hien thao tac!';
                    }
                } else {
                    echo 'create fail';
                }
            }
        }
    }

    /// hien thi form update user
    public function edit($id)
    {
        $check = $this->checkLoginCookie();
        if ($check) {
            $user = new User();
            $item = $user->getItem($id);

            View::render('User/update.php', compact('item'));
        }else{
            header('Location: /login');
        }
    }

    // update user
    public function update($id, $per)
    {
        $check = $this->checkLoginCookie();

        if ($check) {
            $perUser = $_COOKIE['permission']; // $perUser user đang đăng nhập, $per là user được update

            $user = new User();
            $info = $user->getItem($id);

            if ($perUser == 1 && $per ==1){ // admin update admin
                $permission = 1;
                setcookie('pass', md5($_POST['pass']), time() + 600, "/");
                $name = $info['name'];
            }elseif ($perUser == 1 && $per == 0){ // admin update user
                $permission = 0;
                setcookie('pass', md5($_POST['pass']), time() + 600, "/");
                $name = $info['name'];
            }elseif ($perUser == 0 && $per == 0){ // user update user
                $permission = 0;
                setcookie('pass', md5($_POST['pass']), time() + 600, "/");
                if ($info['name'] == $_COOKIE['name']) {
                    $name = $info['name'];
                }else{
                    header('Location: /login');
                }
            }

            $pass = $_POST['pass'];
            $address = $_POST['address'];

            if ($name == "" || $pass == "" || $address == "") {
                echo 'Vui long nhap du thong tin!';
            } else {
                $item = array(
                    'id' => $id,
                    'name' => $name,
                    'pass' => $pass,
                    'address' => $address,
                    'permission' => $permission
                );

                $status = $user->updateUser($item);

                if ($status) {

                    setcookie('address', $address, time() + 600, "/");

                    if ($perUser == 1) {
                        header("location: /users");
                    } else {
                        header("location: /user/info");
                    }
                } else {
                    echo 'update fail';
                }
            }
        }else{
            header('Location: /login');
        }
    }

    // xoa user
    public function destroy($id)
    {
        $check = $this->checkLoginCookie();

        if ($check) {
            if ($check['permission'] == 1) {
                $user = new User();
                $status = $user->deteleUser($id);

                if ($status){
                    header("location: /users");
                }else{
                    echo "delete fail";
                }
            }else{
                header("location: /login");
            }
        }else{
            header("location: /login");
        }
    }

}
<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */

    public function checkLogin($name, $pass){
        $db = static::getDB();
        $sql = "SELECT * FROM `User` WHERE `name` = '". $name ."' AND `pass` = '". $pass ."'";

        $result = $db->query($sql);

        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    // kiem tra tai khoan da ton tai chua
    public function checkAccount($name){
        $db = static::getDB();

        $sql = "SELECT * FROM `User` WHERE `name` = '". $name ."'";
        $result = $db->query($sql);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItem($id){
        $db = static::getDB();
        $item = $db->query('SELECT * FROM User WHERE `id` = '. $id . '');
        return $item->fetch(\PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM User');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addUser($user){
        $db = static::getDB();

        $name = $user['name'];
        $pass = md5($user['pass']);
        $address = $user['address'];
        $permission = $user['permission'];

        $sql = "INSERT INTO `User` (`id`, `name`, `pass`, `address`, `permission`) VALUES (NULL, '" . $name. "', '" . $pass. "', '" . $address. "', '" . $permission. "');";

        $result = $db->query($sql);

        return $result;
    }

    public function updateUser($user){
        $db = static::getDB();

        $id = $user['id'];
        $name = $user['name'];
        $pass = md5($user['pass']);
        $address = $user['address'];
        $permission = $user['permission'];

        $sql = "UPDATE `User` SET `id` = '" . $id . "', `name` = '" . $name . "', `pass` = '" . $pass . "', `address` = '" . $address . "', `permission` = '" . $permission . "' WHERE `id` = '" . $id . "'";

        $result = $db->query($sql); // tra ve trang thai update

        return $result;
    }

    public function deteleUser($id){
        $db = static::getDB();
        $sql = "DELETE FROM `User` WHERE `id` = '" . $id . "'";

        $result = $db->query($sql); // tra ve trang thai delete

        return $result;
    }

}
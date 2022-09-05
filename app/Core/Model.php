<?php

namespace App\Core;

use \PDO;

abstract class Model
{
    protected static $table = '';

    /**
     * Get the PDO database connection
     *
     * @return \PDO|null
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . config('db_host') .'; port='. config('db_port') . ';dbname=' . config('db_database') . ';charset=utf8';
            $db = new PDO($dsn, config('db_username'), config('db_password'));

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }

    public static function all() {
        $db = static::getDB();
        $table_name = static::$table;
        $stmt = $db->query("SELECT * FROM $table_name");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function insert($data) {

    }

    /**
     * Delete a record
     *
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $db = static::getDB();
        $table_name = static::$table;
        $sql = "DELETE FROM $table_name WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(array(':id' => $id));
    }
}
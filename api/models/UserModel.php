<?php

class UserModel {
    public static $table = "users";

    // this will return a single row
    public static function first($condition = []){
       
    }

    // this will return an array
    public static function get(){

    }

    // fetch data based on primary key
    public static function find(){

    }

    public static function update($id, $data = []){
        $table = static::$table;

        $data_str = "";
        foreach($data as $index => $value){
            $data_str .= "$index = '$value',";
        }
        $data_str = rtrim($data_str, ", ");

        $query = "update $table set $data_str where id = '$id'";
        mysqli_query(Database::con(), $query);
    }
}
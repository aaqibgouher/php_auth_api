<?php
class Output {
    public static function response($status, $message, $data = []){
        echo json_encode([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ]);
    }

    public static function error($message = ""){
        static::response(false, $message);
    }

    public static function success($message, $data = []){
        static::response(true, $message, $data);
    }
}

?>
<?php
class Common {
    public static function generate_token(){
        return bin2hex(random_bytes(20));
    }
}

?>
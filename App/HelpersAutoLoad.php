<?php
spl_autoload_register(function ($class_name) {
    if (file_exists("Helper/$class_name.php")){
        require_once "Helper/$class_name.php";
    }
});
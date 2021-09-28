<?php

class Controller
{
    public function loadModel(string $model)
    {
        if (file_exists("Model/".$model.".php")) {
            require_once "Model/".$model.".php";
            return new $model();
        }
    }

    public function loadView(string $view, array $data)
    {
        if (file_exists("View/".$view.".php")) {
            require_once "View/common/header.php";
            require_once "View/".$view.".php";
            require_once "View/common/footer.php";

        }
    }
}
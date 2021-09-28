<?php

class index extends Controller
{
    public function indexAction()
    {
        $model = $this->loadModel("indexModel");
        $users = $model->getAll(table: 'users');
        $this->loadView("index/indexAction", [
            'title' => "Home",
            'data' => [
                'users' => $users
            ]
        ]);
    }
    public function notFound()
    {
        header("HTTP/1.1 404 Not Found");
        $this->loadView("index/notFound", [
            'title' => "Home",
            'data' => [
                'content' => 'this page not exists'
            ]
        ]);
    }
}

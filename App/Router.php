<?php

class Router
{
    private $url, $method, $controller, $params , $object;
    public function __construct()
    {
        $this->setUrl();
        $this->setMethod();
        $this->setController();
        $this->setParams();
        if (file_exists('Controller/'. $this->controller . '.php')) {
            require_once 'Controller/'. $this->controller . '.php';
            $this->object = new $this->controller;
            if (method_exists($this->object, $this->method)) {
                call_user_func_array(array($this->object, $this->method), $this->params);
            }else{
                $this->notFound();
            }
        }else{
            $this->notFound();
        }
    }
    private function notFound(){
        require_once 'Controller/index.php';
        $obj = new index();
        $obj->notFound();
    }
    private function setUrl()
    {
        if (isset($_GET['url'])) {
            $this->url = rtrim($_GET['url'], '/');
        } else {
            $this->url = 'index/indexAction';
        }
        return $this->url;
    }

    private function setController()
    {
        $this->controller = explode("/" , $this->url)[0];
    }

    private function setMethod()
    {
        @$this->method = explode("/" , $this->url)[1];
    }

    private function setParams()
    {
        $this->params = array_slice(explode('/', $this->url), 2);
        if(sizeof($this->params)==0){
            $this->params = [""];
        }
    }
}
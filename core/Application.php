<?php

namespace App\Core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public static Application $app;
    public Controller $controller;
    public DataBase $db;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app      = $this;
        $this->request  = new Request();
        $this->response = new Response();
        $this->session  = new Session();
        $this->router   = new Router($this->request, $this->response);
        $this->db       = new DataBase($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
}

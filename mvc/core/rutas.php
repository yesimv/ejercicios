<?php

class rutas
{

    protected $controller = 'HomeController';
    protected $method = 'index';
    protected array $params = [];

    public function __construct()
    {
        require_once 'controllers.php';

        //obitnees un array de la url
        $url = $this->getUrl();

        //set al controlador
        if (!empty($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerPath = "../app/controllers/$controllerName.php";
            if (file_exists($controllerPath)) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        //intancias clase
        require_once "../app/Controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        //set a metodo
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        /* esto te sirve si vas a usar paramtros en la url despues de un /, ejemplo: usuarios/editar/5 */
        $this->params = $url ? array_values($url) : [];

        call_user_func_array(
            [$this->controller, $this->method],
            $this->params
        );
        
    }

    private function getUrl(): array
    {
        if (!isset($_GET['url'])) {
            return [];
        }

        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        return explode('/', $url);
    }
}

<?php
use app\controllers\userController;
$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH','/MVC/');
switch ($request) {
    case BASE_PATH:
        require_once __DIR__ . '/app/controllers/UserController.php';
        $controller = new UserController();
        $controller->load_view('index',[]);
        break;

    case BASE_PATH.'all-users':
        require_once __DIR__ . '/app/controllers/UserController.php';
        $controller = new UserController();
        $controller->all();
        break;
     
        case BASE_PATH. 'register':
            require_once __DIR__. '/app/controllers/UserController.php';
            $controller = new UserController();
            $controller->register();
            break;

            case BASE_PATH. 'show':
                require_once __DIR__ . '/app/controllers/UserController.php';
                $controller = new UserController();
                $controller->get_one();
                break;
            case BASE_PATH. 'update':
                require_once __DIR__. '/app/controllers/UserController.php';
                $controller = new UserController();
                $controller->edit();
                break;

}
       

?>
<?php
    require_once "models/BookModel.php";
    require_once "models/UserModel.php";
    require_once "models/OrderModel.php";
    require_once "controllers/BookController.php";
    require_once "controllers/UserController.php";
    require_once "controllers/OrderController.php";
    require_once "DBConnection.php";
    
    //Підключення до БД
    const DBNAME = "book_store";
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const PORT = "3307";
    $dbConn = new DBConnection(DBNAME, HOSTNAME, USERNAME, PASSWORD, PORT); 

    //Роутинг за паттерном: "/контроллер/дія/"
    if (empty($_GET['controller'])) {
        (new BookController(new BookModel($dbConn), new UserModel($dbConn))) -> index();
        return;
    }
    else {
        $controllerName =  strtolower($_GET['controller']);
        $action = strtolower($_GET['action']);
        $arg = strtolower($_GET['arg']);

        switch($controllerName)
        {
            case "book":
                $controller = new BookController(new BookModel($dbConn), new UserModel($dbConn));
            break;
            case "order":
                $controller = new OrderController(new OrderModel(new BookModel($dbConn),new UserModel($dbConn), $dbConn),
                                                  new BookModel($dbConn), 
                                                  new UserModel($dbConn));
            break;
            case "user":
                $controller = new UserController(new UserModel($dbConn));
            break;
            default:
                throw new Exception("Wrong controller!");
        }

        if (!empty($action)) {
            $controller->$action($arg);
        }
        else {
            $controller->index();
        }
    }
?>
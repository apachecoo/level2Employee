<?php

require_once 'database/DatabaseConnection.php';
require_once 'validate/Validator.php';
require_once 'interfaces/InterfazModel.php';
require_once 'abstracts/AbstractModel.php';
require_once 'abstracts/AbstractController.php';
require_once 'abstracts/AbstractView.php';
require_once 'traits/TraitTools.php';
require_once 'models/EmployeeModel.php';
require_once 'controllers/EmployeeController.php';
require_once 'views/employee/EmployeeView.php';
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'EmployeeController';
    $action = 'index';
}
require_once 'controllers/' . $controller . '.php';
$controller = new $controller();
$controller->{$action}();


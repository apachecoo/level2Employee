<?php


$host = 'mariadb'; // Nombre del servicio en el archivo docker-compose.yml
$port = '3306'; // Puerto mapeado en el archivo docker-compose.yml
$dbname = 'level2_employees_db';
$username = 'user';
$password = '12345';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT * FROM employees');
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($datos);

    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

exit();
try {
    $pdo = new PDO('mysql:host=localhost;port=3606;dbname=level2_employees_db', 'user', '12345');
    // Configura el modo de error para que PDO lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT * FROM employees');
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print($datos);

    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage()." detalle: ".$e->getTraceAsString();
}
exit();

require_once('models/EmployeeModel.php');
require_once('controllers/EmployeeController.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'EmployeeController';
    $action = 'index';
}

require_once('controllers/' . $controller . '.php');

$controller = new $controller();
$controller->{$action}();


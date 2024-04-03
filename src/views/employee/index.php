<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
<h1>Listado de Empleados</h1>
<ul>
    <?php foreach ($employees as $employee): ?>
        <li><a href="?controller=EmployeeController&action=show&id=<?= $employee['id'] ?>"><?= $employee['dni'].'-'.$employee['name'].' '.$employee['lastName'] ?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>

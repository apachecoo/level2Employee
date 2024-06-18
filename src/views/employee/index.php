<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Básica con Mini-Framework CSS</title>
    <link rel="stylesheet" href="<?= getenv('BASE_URL').'/public/assets/css/main.css'?>">
</head>
<body>
    <header>
        <h1>Reto empleados</h1>
    </header>
    <main>
        <section>
            <div class="row">
                <div class="col">
                    <a href="?controller=EmployeeController&action=show" class="btn success">Adicionar</a>
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de ingreso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($employees)) {
                        foreach ($employees as $employee): ?>
                            <tr>
                                <td><?= $employee->dni ?></td>
                                <td><?= $employee->name ?></td>
                                <td><?= $employee->lastName ?></td>
                                <td><?= $employee->birthdate ?></td>
                                <td>
                                    <a href="?controller=EmployeeController&action=show&id=<?= $employee->id ?>" class="btn info">Actualizar</a>
                                    <a href="?controller=EmployeeController&action=delete&id=<?= $employee->id ?>" class="btn danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning text-center" role="alert">
                                    No existen datos para mostrar.
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Mi Página</p>
    </footer>
</body>
</html>

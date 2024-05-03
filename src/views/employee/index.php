<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h1>Listado de Empleados</h1>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success ml-auto">Adicionar</button>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($employees)) {
            foreach ($employees as $employee): ?>
                <tr>
                    <th scope="row"><?= $employee['dni'] ?></th>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['lastName'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach;
        } else { ?>
            <tr>
                <td colspan="4">
                    <div class="alert alert-warning text-center" role="alert">
                        No existen datos para mostrar.
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

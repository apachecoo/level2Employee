<?php
$input = $_REQUEST ?? [];
echo "<pre>";
print_r($input);
echo "</pre>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level 1 employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .card {
            width: 30rem; /* Ampliar el tamaño del card */
            margin: 0 auto; /* Centrar el card horizontalmente */
            margin-top: 20px; /* Espacio superior */
        }

        .btn-custom-width {
            width: 200px; /* El ancho que desees */
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mt-5 mb-4">Información del Empleado</h2>
    <div class="card">
        <img src="public/img/perfil.png" class="card-img-top" alt="Foto del Empleado" id="employee-photo">
        <div class="card-body">
            <h5 class="card-title">Registro empleado</h5>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="gender">Género:</label>
                    <select name="employee[gender]" id="gender" class="form-select">
                        <option value="">Seleccione...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="birthdate" name="employee[birthdate]">
                </div>
                <div class="form-group">
                    <label for="joindate">Fecha de Ingreso:</label>
                    <input type="date" class="form-control" id="joindate" name="employee[joindate]">
                </div>
                <div class="form-group">
                    <label for="salary">Salario Básico:</label>
                    <input type="text" class="form-control" id="salary" name="employee[salary]">
                </div>
                <hr>
                <button
                        type="submit"
                        class="btn btn-primary btn-custom-width"
                        id="update-salary-btn"
                        value="modifySalary"
                        name="action">
                    Modificar Salario
                </button>

                <div class="row">
                    <div class="col">
                        <button
                                class="btn btn-secondary btn-custom-width"
                                id="calculate-btn"
                                value="calculateAge"
                                name="action">Calcular Edad
                        </button>
                    </div>
                    <div class="col">
                        <p>valor edad</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-secondary btn-custom-width"
                                id="calculate-btn"
                                name="action"
                                value="calculateSeniority"
                        >
                            Calcular Antigüedad
                        </button>
                    </div>
                    <div class="col">
                        <p>valor antigüedad</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button class="btn btn-secondary btn-custom-width"
                                id="calculate-btn"
                                value="calculateBenefits"
                                name="action"
                        >
                            Calcular Prestaciones
                        </button>
                    </div>
                    <div class="col">
                        <p>prestaciones</p>
                    </div>
                </div>

                <button
                        class="btn btn-info btn-custom-width"
                        id="change-employee-btn"
                        name="action"
                        value="changeEmployee"
                >
                    Cambiar Empleado
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

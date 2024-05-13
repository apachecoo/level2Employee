<?php
$isAdd=!$employee || !isset($employee->id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level 1 employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="text-center mt-5 mb-4"><?= !$isAdd ? 'Actualizar' : 'Adicionar' ?> Empleado</h2>
    <div class="row">
        <div class="col-lg-8 <?= $isAdd ? 'col-lg-12' : 'col-lg-8' ?> ">
            <div class="card">
                <div class="card-header">
                    Formulario actualización
                </div>
                <div class="card-body">
                    <?php include_once 'form.php' ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <?php !$isAdd ? include_once 'calculatedFields.php' : ''; ?>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

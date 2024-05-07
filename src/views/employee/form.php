<?php


?>

<form class="row g-3" action="" method="post">
    <div class="col-md-3">
        <label for="name" class="form-label">Documento</label>
        <input type="text" class="form-control is-valid" id="name" name="employee[dni]" value="<?= $employee->dni ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control is-valid" id="name" name="employee[name]" value="<?= $employee->name ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Apellido</label>
        <input type="text" class="form-control is-valid" id="lastName" name="employee[lastName]" value="<?= $employee->lastName ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-md-3">
        <label for="name" class="form-label">Género</label>
        <select name="employee[gender]" id="gender" class="form-select">
            <option value="">Seleccione...</option>
            <option value="M" <?= $employee->gender==='M'? 'selected':''; ?> >Masculino</option>
            <option value="F" <?= $employee->gender==='F'? 'selected':''; ?> >Femenino</option>
        </select>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="name" class="form-label">Fecha de nacimiento</label>
        <input type="text" class="form-control is-valid" id="name" name="employee[birthdate]" value="<?= $employee->birthdate ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Fecha de ingreso</label>
        <input type="text" class="form-control is-valid" id="lastName" name="employee[joindate]" value="<?= $employee->joindate ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Salario básico</label>
        <input type="text" class="form-control is-valid" id="lastName" name="employee[salary]" value="<?= $employee->salary ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Edad</label>
        <input type="text" class="form-control is-valid" id="lastName" name="employee[salary]" value="<?= $employee->calculateAge() ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>


    <div class="col-12">
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </div>
</form>
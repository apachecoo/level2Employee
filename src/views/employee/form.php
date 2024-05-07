<?php
$action = !$employee ? '?controller=EmployeeController&action=store'
    : '?controller=EmployeeController&action=update&id=' . $employee->id;
$labelButton= !$employee ? 'Adicionar':'Actualizar';
$colorButton= !$employee ? 'btn-success':'btn-primary';
?>

<form class="row g-3" action="<?= $action ?>" method="post">
    <div class="col-md-3">
        <label for="name" class="form-label">Documento</label>
        <input type="text" class="form-control" id="name" name="employee[dni]"
               value="<?= $employee ? $employee->dni : '' ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="employee[name]"
               value="<?= $employee ? $employee->name : '' ?>"
               required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="lastName" name="employee[lastName]"
               value="<?= $employee ? $employee->lastName : '' ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-md-3">
        <label for="name" class="form-label">Género</label>
        <select name="employee[gender]" id="gender" class="form-select">
            <option value="">Seleccione...</option>
            <option value="M" <?= $employee ? $employee->gender === 'M' ? 'selected' : '' : ''; ?> >Masculino</option>
            <option value="F" <?= $employee ? $employee->gender === 'F' ? 'selected' : '' : ''; ?> >Femenino</option>
        </select>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="name" class="form-label">Fecha de nacimiento</label>
        <input type="text" class="form-control" id="name" name="employee[birthdate]"
               value="<?= $employee ? $employee->birthdate : '' ?>" required>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Fecha de ingreso</label>
        <input type="text" class="form-control" id="lastName" name="employee[joindate]"
               value="<?= $employee ? $employee->joindate : '' ?>" required>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Salario básico</label>
        <input type="text" class="form-control" id="lastName" name="employee[salary]"
               value="<?= $employee ? $employee->salary : '' ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label">Edad</label>
        <input type="text" class="form-control" id="lastName" name="employee[salary]"
               value="<?= $employee ? $employee->calculateAge() : '' ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>


    <div class="col-12">
        <button class="btn <?= $colorButton ?>" type="submit"><?= $labelButton ?></button>
    </div>
</form>
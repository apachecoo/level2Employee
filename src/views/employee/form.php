<?php

$action = !$employee ? '?controller=EmployeeController&action=store' : '?controller=EmployeeController&action=update&id=' . ($employee->id ?? '');
$labelButton = $isAdd ? 'Adicionar' : 'Actualizar';
$colorButton = $isAdd ? 'btn success' : 'btn info';
?>
<!-- <main> -->
    <section>
        <header>
            <h1>Formulario empleado</h1>
        </header>
        <form action="<?= $action ?>" method="post">
            <div class="form-group">
                <label for="dni">Documento</label>
                <input type="text" id="dni" name="employee[dni]" value="<?= $employee ? $employee->dni : '' ?>">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="employee[name]" value="<?= $employee ? $employee->name : '' ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Apellido</label>
                <input type="text" id="lastName" name="employee[lastName]"
                    value="<?= $employee ? $employee->lastName : '' ?>">
            </div>
            <div class="form-group">
                <label for="gender">Género:</label>
                <select name="employee[gender]" id="gender">
                    <option value="">Seleccione...</option>
                    <option value="M" <?= $employee ? $employee->gender === 'M' ? 'selected' : '' : ''; ?>>
                        Masculino
                    </option>
                    <option value="F" <?= $employee ? $employee->gender === 'F' ? 'selected' : '' : ''; ?>>
                        Femenino
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="lastName">Fecha nacimiento:</label>
                <input type="date" class="form-control" id="name" name="employee[birthdate]"
                    value="<?= $employee ? $employee->birthdate : '' ?>">
            </div>
            <div class="form-group">
                <label for="lastName" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" id="lastName" name="employee[joindate]"
                    value="<?= $employee ? $employee->joindate : '' ?>">
            </div>
            <div class="form-group">
                <label for="salary" class="form-label">Salario básico</label>
                <input type="text" id="salary" name="employee[salary]" value="<?= $employee ? $employee->salary : '' ?>">
            </div>
            <!-- <div class="form-group">
                <label for="observations">Observaciones:</label>
                <textarea id="observations" name="employee[observations]"></textarea>
            </div> -->
            <?php
    
            if ($errors) {
                ?>
                <div class="alert alert-danger d-flex align-items-right" role="alert">
                    <strong>Por favor revisar los siguientes errores:</strong>
                    <?php
                    echo '<br><ul>';
                    foreach ($errors ?? [] as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                    echo '</ul>';
                    ?>
                </div>
            <?php } ?>
    
            <button type="submit" class="<?= $colorButton?>"><?= $labelButton ?></button>
    
        </form>
    </section>
<!-- </main> -->
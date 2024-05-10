<div class="card">
    <div class="card-header">
        Campos calculados
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Edad:
                <span id="edad"><?= $employee ? $employee->calculateAge() : '' ?></span>
            </li>
            <li class="list-group-item">Antigüedad:
                <span id="antiguedad"><?= $employee ? $employee->calculateSeniority() : '' ?></span>
            </li>
            <li class="list-group-item">Prestaciones:
                <span id="prestaciones"><?= $employee ? $employee->calculateBenefits() : '' ?></span>
            </li>
        </ul>
    </div>
</div>
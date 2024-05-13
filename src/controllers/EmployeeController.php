<?php

class EmployeeController extends AbstractController
{

    public function __construct()
    {
        $this->view = new EmployeeView;
    }

    private function getEmployeeModel(): ?EmployeeModel
    {
        return new EmployeeModel();
    }

    public function index(): void
    {
        $employees = EmployeeModel::getAll();
        $this->view->index($employees);
    }

    public function show(): void
    {
        $id = $_REQUEST['id'] ?? null;
        $employee = $id ? EmployeeModel::find($id) : null;
        $this->view->show($employee);
    }

    public function delete(): void
    {
        $this->getEmployeeModel()->delete($_REQUEST['id'] ?? null);
        header('Location: /');
    }

    public function update(): void
    {
        $id = (int)$_REQUEST['id'];
        $employeeData = $_REQUEST['employee'] ?? null;
        $employee = new EmployeeModel();
        $this->extracted($employeeData, $employee);
        $employee->update($id);
        header('Location: /');
    }

    public function store()
    {

        $employeeData = $_REQUEST['employee'] ?? null;
        $validations = [
            'dni' => 'required|exists:EmployeeModel',
            'name' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'joindate' => 'required',
            'salary' => 'required',
        ];
        $customFields = [
            'dni' => 'Documento',
            'name' => 'Nombre',
            'lastName' => 'Apellido',
            'gender' => 'Género',
            'birthdate' => 'Fecha de nacimiento',
            'joindate' => 'Fecha de ingreso',
            'salary' => 'Salario',
        ];
        $errors = Validator($employeeData, $validations, $customFields)::validate();
        $employee = new EmployeeModel();
        $this->extracted($employeeData, $employee);
        if ($errors) {
            $this->view->show($employee, $errors);
        } else {
            $employee->save();
            header('Location: /');
        }
    }

    /**
     * @param mixed $employeeData
     * @param EmployeeModel $employee
     * @return void
     */
    public function extracted(mixed $employeeData, EmployeeModel $employee): void
    {
        $employee->dni = $employeeData['dni'] ?? null;
        $employee->name = $employeeData['name'] ?? null;
        $employee->lastName = $employeeData['lastName'] ?? null;
        $employee->gender = $employeeData['gender'] ?? null;
        $employee->birthdate = $employeeData['birthdate'] ?? null;
        $employee->joindate = $employeeData['joindate'] ?? null;
        $employee->salary = $employeeData['salary'] ?? empty($employeeData['salary']) ? $employeeData['salary'] : 0.00;
    }
}


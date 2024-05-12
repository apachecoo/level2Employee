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
//            'dni' => 'required|exists:EmployeeModel',
            'dni' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'joindate' => 'required',
            'salary' => 'required',
        ];
        $errors = Validator::validate($employeeData, $validations);
        if ($errors) {
            $this->view->show(null, $errors);
        } else {
            $employee = new EmployeeModel();
            $employee->dni = $employeeData['dni'] ?? null;
            $this->extracted($employeeData, $employee);
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
        $employee->name = $employeeData['name'] ?? null;
        $employee->lastName = $employeeData['lastName'] ?? null;
        $employee->gender = $employeeData['gender'] ?? null;
        $employee->birthdate = $employeeData['birthdate'] ?? null;
        $employee->joindate = $employeeData['joindate'] ?? null;
        $employee->salary = $employeeData['salary'] ?? null;
    }
}


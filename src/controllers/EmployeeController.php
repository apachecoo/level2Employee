<?php

class EmployeeController
{
    private EmployeeView $view;

    public function __construct()
    {
        $this->view = new EmployeeView;
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
        $id = $_REQUEST['id'] ?? null;
        $employee = new EmployeeModel();
        $employee->delete($id);
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
        $employee = new EmployeeModel();
        $employee->dni = $employeeData['dni'] ?? null;
        $this->extracted($employeeData, $employee);
        $employee->save();
        header('Location: /');
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


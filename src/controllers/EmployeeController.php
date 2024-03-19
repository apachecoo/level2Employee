<?php
class EmployeeController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $employees = EmployeeModel::getAll();
        require_once('../views/employee/index.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $employee = EmployeeModel::find($id);
        require_once('../views/employee/show.php');
    }
}


<?php

class EmployeeController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $employees = EmployeeModel::getAll();
        require_once('./views/employee/index.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(): void
    {
        $id = $_REQUEST['id'];
        $employee = EmployeeModel::find($id);
        require_once('./views/employee/show.php');
    }
}


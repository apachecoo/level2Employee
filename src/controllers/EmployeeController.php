<?php

class EmployeeController
{
    private EmployeeView $view;

    public function __construct()
    {
        $this->view = new EmployeeView;
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $employees = EmployeeModel::getAll();
        $this->view->index($employees);
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(): void
    {
        $id = $_REQUEST['id'];
        $employee = EmployeeModel::find($id);
        $this->view->show($employee);
    }

    public function delete()
    {
        //Your code
    }

    public function edit()
    {
        //Your code
    }
}


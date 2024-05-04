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
        $id = $_REQUEST['id'];
        $employee = EmployeeModel::find($id);
        $this->view->show($employee);
    }

    public function delete(): void
    {
        //Your code
    }

    public function edit(): void
    {
        //Your code
    }
}


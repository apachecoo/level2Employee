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
        //Your code
    }

    public function update(): void
    {
        //Your code
    }

    public function store()
    {
        //Your code
    }
}


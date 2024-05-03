<?php


class EmployeeView
{

    public function index(array $employees): void
    {
        require_once('./views/employee/index.php');
    }

    public function show(array $employee): void
    {
        require_once('./views/employee/show.php');
    }

}
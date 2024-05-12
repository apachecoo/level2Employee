<?php


class EmployeeView extends AbstractView
{

    public function index(array $employees): void
    {
        require_once './views/employee/index.php';
    }

    public function show(?AbstractModel $employee = null): void
    {
        require_once './views/employee/show.php';
    }

}
<?php

class AbstractController
{
    protected EmployeeView $view;
    public function __construct()
    {
        $this->view = new EmployeeView;
    }
}
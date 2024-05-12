<?php

abstract class AbstractView
{
    abstract public function index(array $data);
    abstract public function show();
}
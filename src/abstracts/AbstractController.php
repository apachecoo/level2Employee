<?php

abstract class AbstractController
{
    protected AbstractView $view;

    abstract public function validate(array $data, bool $update = false): array;

}
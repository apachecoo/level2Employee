<?php

$input = $_REQUEST;
echo "<pre>";
print_r(calculateAge($input['employee']));
echo "</pre>";

function calculateAge($employee)
{
    return 'edad';
}

function calculateSeniority()
{
    return 'antigüedad';
}

function calculateBenefits()
{
    return 'prestaciones';
}
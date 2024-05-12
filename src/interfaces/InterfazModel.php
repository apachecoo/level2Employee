<?php

interface InterfazModel
{
    public function save();
    public function update(int $int): bool;
}
<?php

trait TraitTools
{
    /**
     * @param float $number
     * @return string
     */
    public function formatDecimal(float $number, int $decimals): string {
        return number_format($number, $decimals);
    }
}
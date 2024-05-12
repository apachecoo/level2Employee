<?php

class Validator
{
    public static function validate(array $data, $validations): array
    {
        $errors = [];
        foreach ($data as $key => $datum) {
            if (array_key_exists($key, $validations)) {
                $message=(new self())->{$validations[$key]}($key,$datum);
                if($message){
                    $errors[$key] = $message;
                }
            }
        }

        return $errors;
    }

    private function required(string $field, mixed $value): string|null
    {
        $message = 'El campo ' . $field . ' es obligatorio.';
        return empty($value) ? $message : null;
    }

//    private function exists(string $field, mixed $value):string|null
//    {
//        $message = '';
//        $model = $value
//        if(){
//
//        }
//    }
}
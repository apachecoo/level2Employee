<?php

class Validator
{

    public static function validate(array $data, array $validations, array $customFields): array
    {
        $errors = [];
        foreach ($data as $key => $datum) {
            if (array_key_exists($key, $validations)) {
                foreach ($validations as $validation) {
                    if (str_contains($validation, '|')) {
                        $explodeValidations = explode('|', $validation);
                        foreach ($explodeValidations as $explodeValidation) {
                            if (str_contains($explodeValidation, ':')) {
                                $explodeWithParam = explode(':', $explodeValidation);
                                if (is_array($explodeWithParam)) {
                                    $method = $explodeWithParam[0];
                                    $param = $explodeWithParam[1];
                                    if ($message = (new self())->{$method}($key, $datum, $param)) {
                                        $errors[$key] = $message;
                                    }
                                }
                            }
                        }
                    } else {
                        $message = (new self())->{$validation}($key, $datum, $customFields);
                        if ($message) {
                            $errors[$key] = $message;
                        }
                    }
                }
            }
        }

        return $errors;
    }

    private function required(string $field, mixed $value, array $customFields): string|null
    {
        $message = 'El campo ' . $this->replaceFieldsCustomizable($field, $customFields) . ' es obligatorio.';
        return empty($value) ? $message : null;
    }

    /**
     * @throws ReflectionException
     */
    private function exists(string $field, mixed $value, $model): string|null
    {
        if (class_exists($model)) {
            $reflection = new ReflectionClass($model);
            $instance = $reflection->newInstance();
            $sql = 'SELECT * FROM ' . $instance::$table . ' WHERE dni = :dni';
            if ($instance::query($sql, [
                ':dni' => $value
            ])) {
                return 'El documento ' . $value . ' ya existe.';
            }
        } else {
            $mensajeError = "La clase $model no existe.";
            trigger_error($mensajeError, E_USER_ERROR);
        }
        return null;
    }

    private function replaceFieldsCustomizable(string $field, array $customFields): string
    {
        $foundField = $field;
        foreach ($customFields as $customField => $value) {
            if ($customField === $field) {
                $foundField = $value;
            }
        }

        return $foundField;
    }
}
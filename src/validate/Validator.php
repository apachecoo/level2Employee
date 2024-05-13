<?php

class Validator
{
    private array $data;
    private array $validations;
    private array $customFields;

    /**
     * @param array $this->>data
     * @param array $validations
     * @param array $customFields
     */
    public function __construct(array $this->data, array $validations, array $customFields)
    {
        $this->data = $data;
        $this->validations = $validations;
        $this->customFields = $customFields;
    }


    public static function validate(): array
    {
        $errors = [];
        foreach ($this->data as $key => $datum) {
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
                        $message = (new self())->{$validation}($key, $datum);
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
        $message = 'El campo ' . $this->isCustomizable($field, $customFields) . ' es obligatorio.';
        return empty($value) ? $message : null;
    }

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

    private function isCustomizable(string $field, array $customFields): bool
    {
        return in_array($field, $customFields);
    }
}
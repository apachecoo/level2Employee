<?php

abstract class AbstractController
{
    protected AbstractView $view;

    protected function respondJson($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
    }

    protected function respondErrorJson($message, $status = 400) {
        $this->respondJson(['error' => $message], $status);
    }

    protected function dump(mixed $data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";        
    }

    protected function dd(mixed $data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";        
        exit();
    }

    abstract public function validate(array $data, bool $update = false): array;

}
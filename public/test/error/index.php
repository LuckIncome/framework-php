<?php

// определяем константу
define("DEBUG", 1);

class NotFoundException extends Exception
{
    public function __construct($message = "", $code = 404)
    {
        parent::__construct($message, $code);
    }
}

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_error_handler([$this, 'errorHandler']);

        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);

        set_exception_handler([$this, 'exceptionHandler']);

    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$errstr} | Файл: {$errfile}, | Строка: {$errline} \n=================\n", 3, __DIR__ . '/errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();

        if ( !empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) ) {
            error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$error['message']} | Файл: {$error['file']}, | Строка: {$error['line']}\n==========================\n", 3, __DIR__ . '/errors.log');
            ob_end_clean();

            $this->displayError($error['type'],$error['message'],$error['file'],$error['line']);
        } else {
            ob_end_flush();
        }
    }

    public function exceptionHandler($e)
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$e->getMessage()} | Файл: {$e->getFile()}, | Строка: {$e->getLine()}\n==========================\n", 3, __DIR__ . '/errors.log');
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);

        if (DEBUG) {
            require 'views/dev.php';
        } else {
            require 'views/prod.php';
        }

        die;

    }

}

// создадим объект класса ErrorHandler
new ErrorHandler();
test();
/*
try {
  if (empty($test)) {
    throw new Exception('Упс, исключение');
  }
} catch (Exception $e) {
  echo '<pre>';
  var_dump($e);
  echo '</pre>';
}
*/

//throw new NotFoundException('Страница не найдена');

//throw new Exception('Упс, исключение', 503);
//echo $test;
//test();
<?php
namespace App\Exceptions;

use Throwable;

class Handler
{
    public function register(): void
    {
        set_exception_handler([$this, 'handleException']);
        set_error_handler([$this, 'handleError']);
    }

    public function handleException(Throwable $e): void
    {
        $code = $e->getCode();
        http_response_code($code >= 400 ? $code : 500);

        echo '<h1>Application Error</h1>';
        echo '<p><strong>' . htmlspecialchars($e->getMessage()) . '</strong></p>';

        if (ini_get('display_errors')) {
            echo '<pre>' . $e . '</pre>';
        }

        exit;
    }

    public function handleError(
        int $severity,
        string $message,
        string $file,
        int $line
    ): void {
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }
}
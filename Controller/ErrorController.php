<?php
namespace Controller;

class ErrorController
{
    /**
     * 404 error page
     */
    public function notFound()
    {
        http_response_code(404);
        require_once __DIR__ . '/../View/error/404.php';
    }
}

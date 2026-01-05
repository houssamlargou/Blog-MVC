<?php
namespace Controller;

class ArticleController
{
    /**
     * Show list of articles
     */
    public function index()
    {
        require_once __DIR__ . '/../View/article/index.php';
    }

    /**
     * Show one article
     */
    public function show()
    {
        require_once __DIR__ . '/../View/article/show.php';
    }
}

<?php

namespace App\Controllers;

use App\Services\Articles\IndexArticlesService;
use App\Services\Articles\LikeArticleService;
use App\Services\Articles\ShowArticleService;
use App\Services\Comments\ShowCommentsService;
use App\Services\Tags\ShowTagsService;

class ArticlesController
{
    public function index()
    {
        $articles = (new IndexArticlesService())->execute();

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $article = (new ShowArticleService())->execute($vars['id']);
        $comments = (new ShowCommentsService())->execute($article->id());
        $tags = (new ShowTagsService())->execute($article->id());

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }

    public function like(array $vars)
    {
        (new LikeArticleService())->execute((int) $_POST['like'], (int) $vars['id']);

        header('Location: /');
    }

    public function create()
    {
         return require_once __DIR__ . '/../Views/ArticlesCreateView.php';
    }
}
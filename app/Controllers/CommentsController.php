<?php


namespace App\Controllers;

use App\Services\Comments\DeleteCommentService;
use App\Services\Comments\StoreCommentService;

class CommentsController
{
    public function store()
    {
        (new StoreCommentService())->execute($_POST['id'], $_POST['name'], $_POST['content']);

        header('Location: /articles/' . $_POST['id']);
    }

    public function delete()
    {
        (new DeleteCommentService())->execute($_POST['id']);

        header('Location: /articles/' . $_POST['article_id']);
    }
}
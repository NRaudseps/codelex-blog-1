<?php


namespace App\Controllers;


class CommentsController
{
    public function store()
    {
        $articleId = $_POST['id'];
        $name = $_POST['name'];
        $content = $_POST['content'];

        $insertComment = query()
            ->insert('comments')
            ->values([
                'article_id' => '?',
                'name' => '?',
                'content' => '?',
            ])
            ->setParameter(0, $articleId)
            ->setParameter(1, $name)
            ->setParameter(2, $content)
            ->execute();

        header('Location: /articles/' . $articleId);
    }

    public function delete()
    {
        $id = $_POST['id'];
        $articleID = $_POST['article_id'];

        $deleteComment = query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();

        header('Location: /articles/' . $articleID);
    }
}
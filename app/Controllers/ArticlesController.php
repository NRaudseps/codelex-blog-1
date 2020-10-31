<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;


class ArticlesController
{
    private array $articles;

    public function index()
    {
        $articlesQuery = query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $articles = [];

        foreach ($articlesQuery as $article)
        {
            $articles[] = new Article(
                (int) $article['id'],
                $article['title'],
                $article['content'],
                $article['created_at'],
                $article['likes']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $articleQuery = query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute()
            ->fetchAssociative();

        $commentsQuery = query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :articleId')
            ->setParameter('articleId', (int) $vars['id'])
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $comments = [];

        foreach ($commentsQuery as $comment)
        {
            $comments[] = new Comment(
                $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at'],
            );
        }

        $article = new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
            $articleQuery['likes']
        );

        $commentsQuery = query()
            ->select('*')
            ->from('comments')
            ->where('article_id = ' . $article->id())
            ->orderBy('created_at', 'asc')
            ->execute()
            ->fetchAllAssociative();

        $tagsQuery = query()
            ->select('*')
            ->from('tags')
            ->where('id IN (SELECT tag_id FROM article_tag WHERE article_id = :article_id)')
            ->setParameter('article_id', $article->id())
            ->execute()
            ->fetchAllAssociative();

        $tags = [];
        foreach ($tagsQuery as $tag){
            $tags[] = new Tag(
                (int) $tag['id'],
                $tag['name'],
                $tag['created_at']
            );
        }

        $comments = [];
        foreach ($commentsQuery as $commentQuery) {
            $comments[] = new Comment(
                (int) $commentQuery['id'],
                $commentQuery['article_id'],
                $commentQuery['name'],
                $commentQuery['content'],
                $commentQuery['created_at']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }

    public function like(array $vars)
    {
        $like = (int) $_POST['like'];
        $likeQuery = query()
            ->select('likes')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute()
            ->fetchAssociative();

        if($like === 1 || (int) $likeQuery['likes'] > 0) {
            $articleQuery = query()
                ->update('articles')
                ->set('likes', "likes + {$like}")
                ->where("id = :id")
                ->setParameter('id', (int)$vars['id'])
                ->execute();
        }

        header('Location: /');
    }

    public function create()
    {
         return require_once __DIR__ . '/../Views/ArticlesCreateView.php';
    }

    public function delete(array $vars)
    {
        query()
            ->delete('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute();

        header('Location: /articles/');
    }
}
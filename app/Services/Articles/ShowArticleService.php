<?php


namespace App\Services\Articles;


use App\Models\Article;

class ShowArticleService
{
    public function execute(int $id): Article
    {
        $articleQuery = query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        $article = new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
            $articleQuery['likes']
        );

        return $article;
    }
}
<?php

namespace App\Services\Articles;

use App\Models\Article;

class IndexArticlesService
{
    public function execute(): array
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

        return $articles;
    }
}
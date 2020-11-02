<?php


namespace App\Services\Articles;

class LikeArticleService
{
    public function execute(int $like, int $id): void
    {
        $likeQuery = query()
            ->select('likes')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        if ($like === 1 || (int)$likeQuery['likes'] > 0) {
            $articleQuery = query()
                ->update('articles')
                ->set('likes', "likes + {$like}")
                ->where("id = :id")
                ->setParameter('id', $id)
                ->execute();
        }
    }
}
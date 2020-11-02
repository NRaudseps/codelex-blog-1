<?php


namespace App\Services\Comments;


class StoreCommentService
{
    public function execute(int $articleId, string $name, string $content): void
    {
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
    }
}
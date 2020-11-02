<?php


namespace App\Services\Comments;

use App\Models\Comment;


class ShowCommentsService
{
    public function execute(int $articleId): array
    {
        $commentsQuery = query()
            ->select('*')
            ->from('comments')
            ->where('article_id = ' . $articleId)
            ->orderBy('created_at', 'asc')
            ->execute()
            ->fetchAllAssociative();


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

        return $comments;
    }
}
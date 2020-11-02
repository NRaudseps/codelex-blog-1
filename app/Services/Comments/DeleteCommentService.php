<?php


namespace App\Services\Comments;


class DeleteCommentService
{
    public function execute(int $id): void
    {
        $deleteComment = query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}
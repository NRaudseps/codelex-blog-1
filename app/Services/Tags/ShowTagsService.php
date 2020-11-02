<?php


namespace App\Services\Tags;

use App\Models\Tag;

class ShowTagsService
{
    public function execute(int $articleId): array
    {
        $tagsQuery = query()
            ->select('*')
            ->from('tags')
            ->where('id IN (SELECT tag_id FROM article_tag WHERE article_id = :article_id)')
            ->setParameter('article_id', $articleId)
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

        return $tags;
    }
}
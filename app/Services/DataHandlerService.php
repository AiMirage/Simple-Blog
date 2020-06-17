<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/17/2020
 * Time: 6:39 AM
 */

namespace App\Services;


class DataHandlerService
{

    public function handlePosts($posts)
    {
        $data = [];
        foreach ($posts as $post) {
            $comments = [];

            foreach ($post->comments as $comment) {
                $comments[] = [
                    'text' => $comment->text,
                    'by' => $comment->by->name
                ];
            }

            $data[] = [
                'content' => $post->content,
                'author' => $post->user->name,
                'comments' => $comments
            ];
        }

        return $data;
    }

}
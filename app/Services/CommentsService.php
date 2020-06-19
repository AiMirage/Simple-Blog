<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/16/2020
 * Time: 8:48 PM
 */

namespace App\Services;

use App\Models\Comment;


class CommentsService
{
    public function getComments($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->get();
        return $comments;
    }

    public function getComment($post_id, $id)
    {
        $comment = Comment::where([
            ['post_id' , $post_id],
            ['id' , $id]
        ])->get();

        return $comment;
    }
}
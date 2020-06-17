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
    public function getComments($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return $comments;
    }
}
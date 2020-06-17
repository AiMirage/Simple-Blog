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
//  TODO : get all comments for given post
    public function getComments($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return $comments;
    }

//  TODO : add comment on a given post
}
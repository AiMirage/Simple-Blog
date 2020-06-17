<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/16/2020
 * Time: 2:10 AM
 */

namespace App\Services;

use App\Models\Post;


class PostsService
{
    protected $posts;

    public function getPosts()
    {
        return Post::all();
    }

    public function getPost($id)
    {
        return Post::find($id);
    }
}
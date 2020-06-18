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
        return Post::with(['user', 'comments'])->get();
    }

    public function getPost($id)
    {
        return Post::with(['user', 'comments'])->where('id', $id)->get();
    }

    public function getPostOnly($id)
    {
        return Post::find($id);
    }
}
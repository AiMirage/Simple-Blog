<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/16/2020
 * Time: 2:10 AM
 */

namespace App\Services;

use App\Http\Requests\StoreBlogPost;
use App\Models\Post;
use Illuminate\Http\Request;


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

    public function createPost($content, $user_id)
    {
        $post = new Post();
        $post->content = $content;
        $post->user_id = $user_id;

        // TODO : check if successful either throw exception

        $post->save();

        return $this->getPost($post->id);
    }

    public function deletePost($id)
    {
        // TODO : delete comments too
        return Post::destroy($id);
    }
}
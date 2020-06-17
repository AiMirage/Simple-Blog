<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\CommentsService;
use App\Services\PostsService;

class BlogController extends Controller
{
    protected $postsService;
    protected $commentsService;

    public function __construct(PostsService $ps, CommentsService $cs)
    {
        $this->postsService = $ps;
        $this->commentsService = $cs;
    }

    public function getPost($id)
    {
        $post = $this->postsService->getPost($id);
        $commentsData = $this->commentsService->getComments($id);
        $user = $post->user;

        $comments = [];

        foreach ($commentsData as $comment) {
            $comments[] = [
                'text' => $comment->text,
                'by' => $comment->by->name
            ];
        }

        return response()->json([
            'content' => $post->content,
            'author' => $user->name,
            'comments' => $comments,
        ]);
    }
}

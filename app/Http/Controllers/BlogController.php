<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\User;
use Illuminate\Http\Request;
use App\Services\CommentsService;
use App\Services\PostsService;
use App\Services\DataHandlerService;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    protected $postsService;
    protected $commentsService;
    protected $dataHandler;

    public function __construct(PostsService $ps, CommentsService $cs, DataHandlerService $dh)
    {
        $this->postsService = $ps;
        $this->commentsService = $cs;
        $this->dataHandler = $dh;

        $this->middleware('auth:api', ['only' => ['store', 'update', 'delete']]);
    }

    public function index()
    {
        $posts = $this->postsService->getPosts();
        $data = $this->dataHandler->handlePosts($posts);

        return response($data);
    }

    public function show($id)
    {
        $post = $this->postsService->getPost($id);
        $data = $this->dataHandler->handlePosts($post);

        return response($data);
    }

    public function store(StoreBlogPost $request)
    {
        $postContent = $request->input('content');

        // TODO : get user id from session not request
        $user_id = $request->input('user_id');

        $post = $this->postsService->createPost($postContent, $user_id);
        $post = $this->dataHandler->handlePosts($post);

        return response()->json($post, 200);
    }

    public function update(StoreBlogPost $request, $id)
    {
        // TODO : check if post exist

        // TODO : get user id from session not request
        $user_id = $request->input('user_id');

        $post = $this->postsService->getPostOnly($id);
        $user = User::find($user_id);

        if (Gate::forUser($user)->allows('update-post', $post)) {
            $post->content = $request->input('content');
            $post->save();
            return response()->json($post, 202);
        }
        return response()->json(["message" => "Action Unauthorized"], 401);
    }

    public function destroy()
    {

    }

    public function create()
    {

    }

    public function edit()
    {

    }
}

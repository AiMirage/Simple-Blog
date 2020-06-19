<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\User;
use Illuminate\Http\Request;
use App\Services\CommentsService;
use App\Services\PostsService;
use App\Services\DataHandlerService;
use Illuminate\Support\Facades\Auth;
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

        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
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
        $user_id = Auth::user()->id;
        $post = $this->postsService->createPost($postContent, $user_id);
        $post = $this->dataHandler->handlePosts($post);

        return response()->json($post, 200);
    }

    public function update(StoreBlogPost $request, $id)
    {
        // TODO : check if post exist

        $post = $this->postsService->getPostOnly($id);
        $user = Auth::user();

        if (Gate::forUser($user)->allows('update-post', $post)) {
            $post->content = $request->input('content');
            $post->save();
            return response()->json($post, 202);
        }
        return response()->json(["message" => "Action Unauthorized"], 401);
    }

    public function destroy($id)
    {
        // TODO : on delete cascade action require editing migrations files
        $post = $this->postsService->getPostOnly($id);
        $user = Auth::user();
        if (Gate::forUser($user)->allows('delete-post', $post)) {
            $this->postsService->deletePost($id);
            return response()->json(["message" => "post deleted"], 200);
        }
        return response()->json(["message" => "action unauthorized"], 401);
    }
}

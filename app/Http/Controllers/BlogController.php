<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Services\CommentsService;
use App\Services\PostsService;
use App\Services\DataHandlerService;
use Symfony\Component\VarDumper\Cloner\Data;

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

    public function store(Request $request)
    {
        // post_content
        $postContent = $request->input('content');
        $postAuthor = $request->input('user_id');
        // post_author

        return response()->json($postAuthor);
    }

    public function update(Request $request)
    {

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

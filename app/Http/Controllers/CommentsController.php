<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentsService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    protected $commentsService;

    public function __construct(CommentsService $service)
    {
        $this->commentsService = $service;
    }

    /**
     * Gets all comments on a given post
     *
     * @param $postId integer
     * @return Comment
     */
    public function index($postId)
    {
        $postComments = $this->commentsService->getComments($postId);
        return $postComments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

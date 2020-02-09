<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Post;
use App\Transformers\PostTransformer;
use Exception;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    protected $postTransformer;

    public function __construct(PostTransformer $postTransformer)
    {
        $this->middleware(['auth.basic'])->only(['store']);
        $this->postTransformer = $postTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = request()->limit;

        $posts = Post::paginate($limit ?? 5);

        return $this->respondWithPaginator($posts, [
            'data' => $this->postTransformer->transformCollection($posts->all()),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        $validated['active'] = false;

        try {
            Post::create($validated);
        } catch (Exception $ex) {
            return $this->setStatusCode(500)->respond([
                'message' => 'Cant create post. Something went Wrong. Please try again!',
                'code' => $ex->getCode(),
            ]);
        }

        return $this->respondCreated([
            'message' => 'Post created succesfuly!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->respondNotFound('Post not found   !');
        }

        return $this->respond([
            'data' => $this->postTransformer->transform($post->toArray())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

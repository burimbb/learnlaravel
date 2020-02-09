<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Post;
use App\Tag;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;

class TagController extends ApiController
{
    protected $tagTransformer;

    /**
     * Constructor of this class TagController
     */
    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId = null)
    {
        if (!$postId) {
            $tags = Tag::all();
        } else {
            $post = Post::find($postId);

            if (!$post) {
                return $this->respondNotFound('Post not found! And no tags associated with post!');
            }

            $tags = $post->tags;
        }

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->toArray())
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}

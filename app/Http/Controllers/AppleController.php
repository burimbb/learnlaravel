<?php

namespace App\Http\Controllers;

use App\Apple;
use Illuminate\Http\Request;

class AppleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apples = Apple::allApples();

        return view('pipe')->withApples($apples);
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
     * @param  \App\Apple  $apple
     * @return \Illuminate\Http\Response
     */
    public function show(Apple $apple)
    {
        return Apple::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apple  $apple
     * @return \Illuminate\Http\Response
     */
    public function edit(Apple $apple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apple  $apple
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apple $apple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apple  $apple
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apple $apple)
    {
        //
    }
}

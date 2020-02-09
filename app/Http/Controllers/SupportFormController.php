<?php

namespace App\Http\Controllers;

use App\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SupportFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Support::all();
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
            'name' => 'required|min:3|max:200',
            'email' => 'required|email|max:200',
            'message' => 'required|min:3|max:20000',
        ]);

        Support::create($validated);

        if ($request->wantsJson()) {
            return \response('Your message was saved!', 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }

    /**
     * Create new public function
     */
    public function partials()
    {
        return Cache::remember('support-partials', Carbon::parse('10 seconds'), function(){
            return view('_supportpartials', [
                'supports' =>  Support::inRandomOrder()->limit(5)->get(), 
            ])->render();
        });

    }
}

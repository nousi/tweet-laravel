<?php

namespace App\Http\Controllers;

use App\Model\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tweets = DB::table('tweets')
                 ->get();
        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tweets = DB::table('tweets')
                ->get();
        return view('tweets.create', compact('tweets'));
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
        $tweet = new Tweet;
        $tweet->title = $request->input('title');
        $tweet->text = $request->input('text');
        $tweet->save();
        return redirect(route('tweets.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tweet = Tweet::find($id);
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
        $tweet->title = $request->title;
        $tweet->text = $request->text;
        $tweet->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}

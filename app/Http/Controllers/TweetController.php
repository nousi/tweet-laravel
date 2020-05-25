<?php

namespace App\Http\Controllers;

use App\Model\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        return view('tweets.create');
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
        $user = Auth::user();
        $tweet = new Tweet;
        $tweet->title = $request->input('title');
        $tweet->text = $request->input('text');
        $tweet->user_id = $user->id;
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
        $user = Auth::user();
        $tweet = Tweet::find($id);
        return view('tweets.show', compact('tweet', 'user'));
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
        
        $user = Auth::user();
        if ($user->id === $tweet->user_id) {
            return view('tweets.edit', compact('tweet'));
        } else {
            // 投稿者のidとログインしているユーザーidに差異がある
            return back()->with('flash_message', '投稿者でなければ編集できません');
        }
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
        $user = Auth::user();
        if ($user->id === $tweet->user_id) {
            $tweet->title = $request->title;
            $tweet->text = $request->text;
            $tweet->save();
            return redirect(route('root'))->with('flash_message', '更新されました');
        } else {
            // ログインしていなかったら、Login画面を表示
            return back()->with('flash_message', '投稿者でなければ編集できません');
        }
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
        $user = Auth::user();
        if ($user->id === $tweet->user_id) {
            $tweet->delete();
            return redirect(route('root'))->with('flash_message', '削除されました');
        } else {
            // ログインしていなかったら、Login画面を表示
            return back()->with('flash_message', '投稿者でなければ削除できません');
        }
    }
}

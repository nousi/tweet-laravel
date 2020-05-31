<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use App\Model\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $last_comment_id = $request->id;
        $comment = Comment::find($last_comment_id);
        // $comments = Comment::Where([
        //                             ['tweet_id', '=', $comment->tweet->id],
        //                             ['created_at', '>', $comment->created_at],
        //                         ])->orderBy('created_at', 'asc')->get();
        $comments = Comment::With(['user'])->where([
                                                    ['tweet_id', '=', $comment->tweet->id],
                                                    ['created_at', '>', $comment->created_at],
                                                    ])->orderBy('created_at', 'asc')->get()->toJson();
        return $comments;
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
    public function store(Request $request, Tweet $tweet)
    {
        //
        if (Auth::check()) {
            $user = Auth::user();
            $comment = new Comment();
            $text = $request->input('text');
            $comment->text = $request->input('text');
            $comment->tweet_id = $tweet->id;
            $comment->user_id = $user->id;
            $comment->save();
            return back()->with('flash_message', 'コメントを投稿しました。');
            
        } else {
            // ログインしていなかったら、ロールバック
            return back()->with('flash_message', 'コメントするにはログインする必要があります');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

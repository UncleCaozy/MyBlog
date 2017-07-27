<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PostCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(PostCommentRequest $request)
    {
        Comment::create(array_merge($request->all(),['user_id'=>\Auth::user()->id]));
        return redirect()->action('PostsController@show',['id'=>$request->get('discussion_id')]);
    }
    public function destroy($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->withErrors('删除成功！');
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if(\Auth::user()->id!==$comment->user_id){
            return redirect('/');
        }
        return view('users.edit_comments',compact('comment'));
    }
//    public function update(PostCommentRequest $request,$id)
//    {
//        dd(2);
//        $comment = Comment::findOrFail($id);
//        $comment->update($request->all());
//        return view('users.my_comments');
//    }
}

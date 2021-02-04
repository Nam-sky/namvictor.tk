<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('com_id','DESC')->Paginate(10);
        return view('back-end.comment.listComment',compact('comments'));
    }
    public function destroy(Request $request){
        $id = $request->id;
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['message'=>'Xóa thành công !']);
    }
}

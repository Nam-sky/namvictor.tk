<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\blogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $data = DB::table('blog')->join('category','blog.cate_blog','=','category.cate_id')->orderBy('blog_id','DESC')->Paginate(10);
        $data2 = DB::table('blog')->get();
        return view('back-end.blog.list',compact('data','data2'));
    }
    public function create(){
        $data = Category::all();
        return view('back-end.blog.addBlog',compact('data'));
    }
    public function store(blogRequest $request){
        $blog = Blog::where('blog_name',$request->nameBlog)->first();
        if (!$blog) {
            $blog = new Blog;
            $blog->blog_name = $request->nameBlog;
            $blog->blog_slug = Str::slug($request->nameBlog);
            $blog->cate_blog = $request->category;
            $blog->mota = $request->mota;
            $blog->content = $request->content;
            $filename = $request->fileToUpload->getClientOriginalName();
            $blog->thumbnail = $filename;
            $blog->save();
            $request->file('fileToUpload')->move('public/upload/blog',$filename);
            return back()->with('message','Thêm bài viết thành công');
        }
        else{
            return back()->with('message','Tên bài viết đã tồn tại');
        }
    }
    public function getUpdate($blog_id){
        $blogData = Blog::where('blog_id',$blog_id)->first();
        $cateData = Category::all();
        return view('back-end.blog.update',compact('blogData','cateData'));
    }
    public function postUpdate(Request $request){
        echo $request->id;
        $blog = Blog::find($request->id);
        $blog->blog_name = $request->nameBlog;
        $blog->blog_slug = Str::slug($request->nameBlog);
        $blog->cate_blog = $request->category;
        $blog->mota = $request->mota;
        $blog->content = $request->content;
        if(!empty($request->file('fileToUpload'))){
            $filename = $request->fileToUpload->getClientOriginalName();
            $blog->thumbnail = $filename;
            $request->file('fileToUpload')->move('public/upload/blog',$filename);
        }else{
            $request->fileToUpload = $request->image_current;
        }
        $blog->save();
        return redirect()->Route('blog.list-blog')->with('message','Update thành công');
    }
    public function delete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->Route('blog.list-blog')->with('message','Đã xóa bài viết');
    }
}

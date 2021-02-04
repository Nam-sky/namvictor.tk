<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function index(){
        $data = Category::orderBy('cate_id','DESC')->get();
        return view('back-end.category.Category',compact('data'));
    }
    public function store(Request $request){
        $cate = Category::where('cate_name',$request->nameCate)->first();
        if (!$cate) {
            $cate1 = new Category;
            $cate1->cate_name = $request->nameCate;
            $cate1->save();
            return redirect()-> Route('cate.list-cate')->with('message','Thêm danh mục thành công');
        }
        else{
            return redirect()-> Route('cate.list-cate')->with('message','Danh mục đã tồn tại');
        }
    }
    public function delete($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect()-> Route('cate.list-cate')->with('message1','Đã xóa danh mục');
    }
}

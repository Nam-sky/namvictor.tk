<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library;
use Validator;
use App\Http\Requests\libraryRequest;

class LibraryController extends Controller
{
    public function index(){
        $data = Library::orderBy('library_id','DESC')->Paginate(10);
        return view('back-end.library.Library',compact('data'));
    }
    public function create(libraryRequest $request){
                $library = new Library;
                $library->library_name = $request->image->getClientOriginalName();
                $filename = $request->image->getClientOriginalName();
                $request->file('image')->move('public/upload/library',$filename);
                $library->save();

                return back()->with('message','Thêm ảnh thành công');
    }
    public function delete($id){
        $library = Library::find($id);
        $library->delete();
        return back()->with('message1','Xóa thành công');
    }
}

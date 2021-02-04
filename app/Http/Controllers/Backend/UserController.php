<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\loginRequest;
use App\Http\Requests\userRequest;

class UserController extends Controller
{
    public function index(){
        $data = User::Paginate(5);
        return view('back-end.user.User',compact('data'));
    }
    public function create(userRequest $request){
        $username = User::where('name',$request->username)->first();
        $email = User::where('email',$request->email)->first();
        if (!$username && !$email) {
            $user = new User;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.list-user')->with('message','Thêm User thành công');
        }else{
            return redirect()-> Route('user.list-user')->with('message','User name hoăc email đã tồn tại đã tồn tại');
        }
    }
    public function login(loginRequest $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($arr)) {
            return view('back-end.master');
        }else{
            return redirect()->back()->with('message','Tài khoản hoặc mật khẩu sai !');
        }
    }
    public function logout() {
        Auth::logout();
        return view('back-end.login');
    } 
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->Route('user.list-user')->with('message1','Đã xóa User');
    }
}

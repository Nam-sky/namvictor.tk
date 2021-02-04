<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('back-end.contact.listContact',compact('contacts'));
    }
    public function store(Request $request){
        $random = rand(10,100);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->age = $request->age;
        $contact->number = $random;
        $contact->save();
        if($contact->id){
            if($random<=30 ){
                setType($random,"string");
                $json = ['status'=>true,'message'=>'Thật buồn ! Độ phù hợp của bạn và Nam Victor chỉ là ','random'=>$random];
            }elseif($random>30 &&$random<=60){
                setType($random,"string");
                $json = ['status'=>true,'message'=>'Độ phù hợp của bạn và Nam Victor là ','random'=>$random];
            }elseif($random>60 && $random<=80){
                setType($random,"string");
                $json = ['status'=>true,'message'=>'Wow ! Độ phù hợp của bạn và Nam Victor là ','random'=>$random];
            }elseif($random>80){
                setType($random,"string");
                $json = ['status'=>true,'message'=>'Thật tuyệt vời ! Độ phù hợp của bạn và Nam Victor là ','random'=>$random];
            }
        }else{
            $json = ['status'=>false,'message'=>'Lỗi !'];
        }
        return response()->json($json);
    }
    public function destroy(Request $request){
        $contact = Contact::find($request->id);
        $contact->delete();
        $json = ['message'=>'Xóa thành công !'];
        return response()->json($json);
    }
}

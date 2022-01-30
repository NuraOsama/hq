<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function contact(Request $request){
        $validator=Validator::make($request->all(),[
            'message'=>'required',
            'image'=>'required'
        ]);
        if ($validator->passes()) {
            $data=$request->all();
            if($request->hasFile('image'))
            {
                $data['image'] = upload_image($request->file('image'), 'image');
            }
            $data['user_id'] = Auth()->user()->id;
            $contact = Contact::create($data);
            $arr['id']=$contact->id;
            $arr['message']=$contact->message;
            $arr['image']=asset($contact->image);

            return response([
                'status' =>true ,
                'message' =>trans('api.message_sent')  ,
                'data' =>$arr
            ]); 
        }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['message'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.message_required') ,
                        'data' =>[]
                    ]);
                }elseif (isset($value['image'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.image_requred') ,
                        'data' =>[]
                    ]);
                }  else{
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.fail') ,
                        'data' =>[]
                    ]);
                }
             }
        }
    }
}

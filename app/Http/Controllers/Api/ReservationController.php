<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Appointment;
use App\Models\Offer;
use App\Models\Rate;
use App\Models\Result;
use App\Models\Test;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ReservationController extends Controller
{
    public function home_reservation(Request $request){
        $validator=Validator::make($request->all(),[
            'time'=>'required',
            'date'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'photo'=>'required',
            'type'=>'required',
            'type_id'=>'required',
            'address_id'=>'required',
        ]);
        if ($validator->passes()) {
            $address = Address::find($request->address_id);
            if(!$address){
                return response()->json([
                    'status' =>false ,
                    'message' =>trans('api.address_not_correct') ,
                    'data' =>[]
                ]);
            }
            $data = $request->all();
            if($request->type == 'test'){
                $test = Test::find($request->type_id);
                if(!$test){
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.test_not_valid') ,
                        'data' =>[]
                    ]);
                }
                $data['choice'] = 'test';
                $data['test_id'] = $request->type_id;
            }else{
                $offer = Offer::find($request->type_id);
                if(!$offer){
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.offer_not_valid') ,
                        'data' =>[]
                    ]);
                }
                $data['choice'] = 'offer';
                $data['offer_id'] = $request->type_id;
            }
            if($request->hasFile('photo'))
            {
                $fileName = upload_image($request->file('photo'), 'photo');
            }
            $data['photo'] = $fileName;
            $data['type']  = 'home';
            $data['user_id'] = Auth()->user()->id;
            $visit = Visit::create($data);
            $data['id'] = $visit->id;
            $data['time'] = $visit->time;
            $data['name'] = $visit->name;
            $data['date'] = $visit->date;
            $data['photo'] = asset($visit->photo);
            $data['phone'] = $visit->phone;
            $data['type'] = $visit->choice;
            $data['address'] = $visit->address->city;
            $data['user'] = $visit->user->name;
            if($visit->choice == 'test'){
                $data['test'] = $visit->test->translate('en')->name;
            }else{
                $data['offer'] = $visit->offer->translate('en')->name;
            }

            return response([
                'status' =>true ,
                'message' =>trans('api.reservation_sent')  ,
                'data' =>$data
            ]); 
        }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['time'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.time_required') ,
                        'data' =>[]
                    ]);
                }elseif (isset($value['date'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.date_requred') ,
                        'data' =>[]
                    ]);
                } elseif (isset($value['name'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.name_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['phone'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.phone_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['photo'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.photo_required') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['type'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.type_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['address_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.address_id_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['type_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.type_id_requred') ,
                        'data' =>[]
                    ]);
                }else{
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.fail') ,
                        'data' =>[]
                    ]);
                }
             }
        }
    }

    public function rate(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'visit_id'=>'required',
            'rate'=>'required'
        ]);
        if ($validator->passes()) {
            $visit = Visit::find($request->visit_id);
            if($visit){
                $user_id = Auth()->user()->id;
                $rate = Rate::where('user_id',$user_id)
                ->where('visit_id',$request->visit_id)->first();
                if($rate){
                    return response([
                        'status' =>false ,
                        'message' =>trans('api.rated_befor')  ,
                        'data' =>[]
                    ]); 
                }else{
                    $data = $request->all();
                    $data['user_id'] = $user_id;
                    $rate = Rate::create($data);
                    $dat['id'] = $rate->id;
                    $dat['rate'] = $rate->rate;
                    $dat['user'] = $rate->user->name;
                    return response([
                        'status' =>true ,
                        'message' =>trans('api.rated')  ,
                        'data' =>$dat
                    ]); 
                }
            }else{
                return response([
                    'status' =>false ,
                    'message' =>trans('api.rate_not_available')  ,
                    'data' =>[]
                ]); 
            }
        }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['visit_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.visit_id_required') ,
                        'data' =>[]
                    ]);
                }elseif (isset($value['rate'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.rate_requred') ,
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

    public function UserReservation(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'type'=>'required'
        ]);
        if ($validator->passes()) {
            $user_id = Auth()->user()->id;
            $visits = Visit::where('user_id',$user_id)->where('choice',$request->type)
            ->orderBy('id','DESC')->get();
            if(count($visits)>0){
                $data = [];
                foreach($visits as $visit){

                    $arr['id'] = $visit->id;
                    $arr['time'] = $visit->time ? $visit->time : "";
                    $arr['date'] = $visit->date ? $visit->date : "";
                    $arr['appointment_id'] = $visit->appointment_id ? $visit->appointment_id : "";
                    $arr['type'] = $visit->type;
                    $arr['status'] = $visit->status ? $visit->status : 'Away';
                    if($request->type == 'test'){
                        $arr['test'] = $visit->test->translate('en')->name;
                    }else{
                        $arr['offer'] = $visit->offer->translate('en')->name;
                    }
                    $data[] = $arr;
                }
                return response([
                    'status' =>true ,
                    'message' =>trans('api.umy_reservations')  ,
                    'data' =>$data
                ]); 
            }else{
                return response([
                    'status' =>false ,
                    'message' =>trans('api.no_reservations')  ,
                    'data' =>[]
                ]); 
            }
        }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['type'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.type_requred') ,
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
    
 
    public function DeleteReservation(Request $request){
        $reservation_id = $request->reservation_id;
        $visit = Visit::find($reservation_id);
        if($visit){
            $visit->delete();
            return response([
                'status' =>true ,
                'message' =>trans('api.reservation_deleted')  ,
                'data' =>[]
            ]); 
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.reservation_not_valid')  ,
                'data' =>[]
            ]); 
        }
    }

    public function CancelReservation(Request $request){
        $reservation_id = $request->reservation_id;
        $visit = Visit::find($reservation_id);
        if($visit){
            $visit->status = 'cancel';
            $visit->save();
            $data['id'] = $visit->id;
            $data['name'] = $visit->name;
            $data['photo'] = asset($visit->photo);
            $data['phone'] = $visit->phone;
            $data['status'] = $visit->status;
            $data['type'] = $visit->choice;
            $data['appointment'] = $visit->appointment->date;
            $data['user'] = $visit->user->name;
            if($visit->choice == 'test'){
                $data['test'] = $visit->test->translate('en')->name;
            }else{
                $data['offer'] = $visit->offer->translate('en')->name;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.reservation_canceled')  ,
                'data' =>$data
            ]); 
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.reservation_not_valid')  ,
                'data' =>[]
            ]); 
        }
    }

    public function UserReservationResult(Request $request){
        $user_id = auth()->user()->id;
        $results = Result::where('user_id',$user_id)->get();
        if(count($results)>0){
            $data = [];
            foreach($results as $result){
                $arr['id'] = $result->id;
                $arr['time'] = $result->time;
                $arr['date'] = $result->date;
                $arr['file'] = asset($result->file);
                $arr['seen'] = $result->seen ? '1':'0';
                $arr['type'] = $result->visit->choice;
                if($result->visit->choice == 'test'){
                    $arr['test'] = $result->visit->test->translate('en')->name;
                }else{
                    $arr['offer'] = $result->visit->offer->translate('en')->name;
                }
                $data[] = $arr;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.user_results')  ,
                'data' => $data
            ]);  
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.user_has_no_results')  ,
                'data' =>[]
            ]);  
        }
    }

    public function ResultDetails(Request $request){
        $result = Result::find($request->result_id);
        if( $result){
            $result->seen = '1';
            $result->save();
            $data['id'] = $result->id;
            $data['time'] = $result->time;
            $data['date'] = $result->date;
            $data['file'] = asset($result->file);
            $data['seen'] = $result->seen;
            $data['type'] = $result->visit->choice;
            if($result->visit->choice == 'test'){
                $data['test'] = $result->visit->test->translate('en')->name;
            }else{
                $data['offer'] = $result->visit->offer->translate('en')->name;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.ResultDerails')  ,
                'data' => $data
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.ResultNotValid')  ,
                'data' =>[]
            ]);  
        }
    }

    public function ReservationResult(Request $request){
        $result = Result::where('visit_id',$request->reservation_id)->first();
        if($result){
            $result->seen = '1';
            $result->save();
            $data['id'] = $result->id;
            $data['time'] = $result->time;
            $data['date'] = $result->date;
            $data['file'] = asset($result->file);
            $data['seen'] = $result->seen;
            $data['type'] = $result->visit->choice;
            if($result->visit->choice == 'test'){
                $data['test'] = $result->visit->test->translate('en')->name;
            }else{
                $data['offer'] = $result->visit->offer->translate('en')->name;
            }            return response([
                'status' =>true ,
                'message' =>trans('api.ResultDerails')  ,
                'data' => $data
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.ResultNotValid')  ,
                'data' =>[]
            ]);  
        }
    }

    public function lab_reservation(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'appointment_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'photo'=>'required',
            'type'=>'required',
            'type_id'=>'required',
        ]);
        if ($validator->passes()) {
            $appointment = Appointment::find($request->appointment_id);
            if(!$appointment){
                return response()->json([
                    'status' =>false ,
                    'message' =>trans('api.appointment_not_valid') ,
                    'data' =>[]
                ]);
            }
            $data = $request->all();
            if($request->type == 'test'){
                $test = Test::find($request->type_id);
                if(!$test){
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.test_not_valid') ,
                        'data' =>[]
                    ]);
                }
                $data['choice'] = 'test';
                $data['test_id'] = $request->type_id;
            }else{
                $offer = Offer::find($request->type_id);
                if(!$offer){
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.offer_not_valid') ,
                        'data' =>[]
                    ]);
                }
                $data['choice'] = 'offer';
                $data['offer_id'] = $request->type_id;
            }
            if($request->hasFile('photo'))
            {
                $fileName = upload_image($request->file('photo'), 'photo');
            }
            $data['photo'] = $fileName;
            $data['type']  = 'lab';
            $data['user_id'] = Auth()->user()->id;
            $visit = Visit::create($data);
            $data['id'] = $visit->id;
            $data['name'] = $visit->name;
            $data['photo'] = asset($visit->photo);
            $data['phone'] = $visit->phone;
            $data['type'] = $visit->choice;
            $data['appointment'] = $visit->appointment->date;
            $data['user'] = $visit->user->name;
            if($visit->choice == 'test'){
                $data['test'] = $visit->test->translate('en')->name;
            }else{
                $data['offer'] = $visit->offer->translate('en')->name;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.reservation_sent')  ,
                'data' =>$data
            ]); 
         }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['appointment_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.appointment_id_required') ,
                        'data' =>[]
                    ]);
                }elseif (isset($value['name'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.name_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['phone'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.phone_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['photo'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.photo_required') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['type'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.type_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['address_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.address_id_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['type_id'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.type_id_requred') ,
                        'data' =>[]
                    ]);
                }else{
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

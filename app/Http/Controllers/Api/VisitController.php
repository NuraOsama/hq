<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class VisitController extends Controller
{
    public function add_address(Request $request){
        $validator=Validator::make($request->all(),[
            'latitude'=>'required',
            'longitude'=>'required',
            'city'=>'required',
            'street'=>'required',
            'floor_number'=>'required',
            'building_number'=>'required',
        ]);
        if ($validator->passes()) {
            $data = $request->all();
            $data['user_id'] = Auth()->user()->id;
            $address = Address::create($data);
            $data['id'] = $address->id;
            if($address){
                return response([
                    'status' =>true ,
                    'message' =>trans('api.address_added')  ,
                    'data' =>$data
                ]); 
            }else{
                return response([
                    'status' =>false ,
                    'message' =>trans('There is a problem you must try again')  ,
                    'data' =>[]
                ]); 
            }
        }else{
            foreach ((array)$validator->errors() as $value){
                if (isset($value['latitude'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.latitude_required') ,
                        'data' =>[]
                    ]);
                }elseif (isset($value['longitude'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.longitude_requred') ,
                        'data' =>[]
                    ]);
                } elseif (isset($value['city'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.city_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['street'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.street_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['floor_number'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.floor_number_requred') ,
                        'data' =>[]
                    ]);
                }  elseif (isset($value['building_number'])) {
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.building_number_requred') ,
                        'data' =>[]
                    ]);
                } else{
                    return response()->json([
                        'status' =>false ,
                        'message' =>trans('api.fail') ,
                        'data' =>[]
                    ]);
                }
             }
        }
    }

    public function user_addresses(Request $request)
    {
        $addresses = Address::where('user_id',auth()->user()->id)->get();
        if(count($addresses)>0){
            $data = [];
            foreach($addresses as $address){
                $arr['id'] = $address->id;
                $arr['latitude'] = $address->latitude;
                $arr['longitude'] = $address->longitude;
                $arr['city'] = $address->city;
                $arr['street'] = $address->street;
                $arr['building_number'] = $address->building_number;
                $arr['floor_number'] = $address->floor_number;
                $data[] = $arr;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.addresses')  ,
                'data' =>$data
            ]); 
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.no_addresses')  ,
                'data' =>[]
            ]); 
        }
    }
}

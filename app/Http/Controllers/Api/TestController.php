<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Test;
use App\Models\TestTranslation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TestController extends Controller
{
    public function test(Request $request){
        $search = $request->search;
        $lang = 'en';
        if($search){
            $test_ids = TestTranslation::where('name', 'like', '%' .$search . '%')->pluck('test_id')->toArray();  
            $tests = Test::whereIn('id', $test_ids)->orderBy('id','DESC')->get();
        }else{
            $tests = Test::orderBy('id','DESC')->get();
        }
        if(count($tests)>0){
            foreach($tests as $test){
                $arr['id']=  $test->id;
                $arr['name']=  $test->translate($lang)->name;
                $arr['description']=  strip_tags($test->translate($lang)->description);
                $arr['type']=  strip_tags($test->translate($lang)->type);
                $arr['duration']=  $test->duration;
                $arr['price']=  $test->price;
                $arr['image']=  url('/').'/'.$test->image;
                $data[] = $arr;
            }
            $page = $request->get('page', 1);
            $perPage = 20;
            $offset = ($page * $perPage) - $perPage;
    
            $count = count($arr);
            return new LengthAwarePaginator($data, $count, $perPage, $offset);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.no_tests')  ,
                'data' =>[]
            ]);
        }
    }

    public function appointments(Request $request)
    {
        # code...
        $appointments = Appointment::get();
        $data =[];
        if(count($appointments)>0){
            foreach($appointments as $appointment){
                $arr['id']   = $appointment->id;
                $arr['day']  = $appointment->day;
                $arr['date'] = $appointment->date;
                $arr['time'] = $appointment->time;
                $data[] = $arr;
            }
            return response([
                'status' =>true ,
                'message' =>trans('api.appointments')  ,
                'data' =>$data
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans('api.no_appointments')  ,
                'data' =>[]
            ]);
        }
    }
}

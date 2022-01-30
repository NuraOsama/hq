<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    public function UserOffers(Request $request){
        $user =User::find(Auth()->user()->id);
        $age = $user->age;
        $gender = $user->gender;
        $offers = Offer::where('value',$gender)->orWhere('value',$age)->get();
        if(count($offers)>0){
            $data = [];
            foreach($offers as $offer){
                $arr['id'] = $offer->id;
                $arr['name'] = $offer->translate('en')->name;
                $arr['description'] = strip_tags($offer->translate('en')->description);
                $arr['type'] = $offer->type;
                $arr['image'] = asset($offer->image);
                $data[] = $arr;
            }
            return response([
                'status' =>true ,
                'message' =>trans("api.offers")  ,
                'data' =>$data
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans("api.no_offers")  ,
                'data' =>[]
            ]);
        }
    }

    public function OfferDetails(Request $request){
        $offer = Offer::find($request->offer_id);
        if($offer){
        $u['id'] = $offer->id;
        $u['name'] = $offer->translate('en')->name;
        $u['description'] = strip_tags($offer->translate('en')->description);
        $u['type'] = $offer->type;
        $u['image'] = asset($offer->image);
        $tests = json_decode($offer->tests);
        $tests = Test::whereIn('id',$tests)->get();

        foreach($tests as $test){
            $arr['id'] = $test->id;
            $arr['name'] = $test->translate('en')->name;
            $arr['description'] = strip_tags($test->translate('en')->description);
            $arr['type']=  strip_tags($test->translate('en')->type);
            $arr['duration']=  $test->duration;
            $arr['price']=  $test->price;
            $arr['image']=  asset($test->image);
            $u['tests'][]= $arr;
        }


        return response([
            'status' =>true ,
            'message' =>trans("Offer details")  ,
            'data' =>$u
        ]);

    }else{
        return response([
            'status' =>false ,
            'message' =>trans("api.offer_id_false")  ,
            'data' =>[]
        ]);

    }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ResultRequest;
use App\Models\NotificationPhone;
use App\Models\Result;
use App\Models\User;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use View;

class ReservationController extends Controller
{

    public function __construct(){
        $this->middleware(function($request, $next){
            $users = User::get();
            View::share('users', $users);
            return $next($request);
        });
    }

    public function filter($type, $location,  $user_id)
    {
         $visits = Visit::orderBy('id', 'desc');
                if($type != "0")
                {
                    $visits = $visits->where('choice', $type);
                }
                if($location != '0')
                {
                    $visits = $visits->where('type', $location);
                }
                if($user_id !=  '0' )
                {
                    $visits = $visits->where('user_id', $user_id);
                }
               
              return  $visits->paginate(25);

    }


    public function reservations(Request $request){
        $params = $request->all();
        if($request->_token)
        {
            $visits = $this->filter($params['type'] , $params['location'],  $params['user_id']);
        }
        else
        {
            $visits = Visit::orderBy('id','DESC')->paginate(20);
        }
        return view('dashboard.visits.index', compact('visits'));
    }

    public function reservationDetails($id){
        $visit = Visit::find($id);
        return view('dashboard.visits.details', compact('visit'));
    }

    public function reservationConfirm($id){
        return view('dashboard.visits.confirm',compact('id'));
    }

    public function reservationResult($id){
        return view('dashboard.visits.result',compact('id'));
    }

    public function resultStore(ResultRequest $request){
        $data = $request->all();
        $visit = Visit::find($data['visit_id']);
        $visit->status = 'finished';
        $visit->save();
        if($request->hasFile('file'))
        {
            $data['file'] = upload_image($request->file('file'), 'file');
        }
        $data['seen'] = '0';
        $data['user_id'] = $visit->user_id;
        Result::create($data);
        $device_token = User::find($visit->user_id)->device_token;
        if($device_token) {
            $notification = new NotificationPhone();
            $notification->notifier_id= $visit->user_id;
            $notification->request_id= $visit->id;
            $notification->is_read= 0;
            $notification->type= 'visit_result';
            $notification->message="Your result is ready now!";
            $notification->save();
            $data = [
                'title' => "Accept reservation time",
                'message' =>  "Your result is ready now!",
                'type' => "general",
                'priority' => 'high',
              ];
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);
            $notificationBuilder = new PayloadNotificationBuilder($data['title']);
            $notificationBuilder->setBody($data['message'])
                ->setSound('default');
            $notificationBuilder->setclickAction('FLUTTER_NOTIFICATION_CLICK');
            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($data);
           
            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();
            $downstreamResponse = FCM::sendTo($device_token, $option, $notification, $data);
            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();
            $downstreamResponse->tokensToDelete();
            $downstreamResponse->tokensToModify();
            $downstreamResponse->tokensToRetry();
            $downstreamResponse->tokensWithError();
        }
        return redirect()->route('reservations')
        ->with(['success' => trans('Result send successfully')]);
    }

    public function reservationAcceptPost(Request $request){
        $visit = Visit::find($request->vist_id);
        $visit->accept = $request->accept;
        $visit->save();
        $device_token = User::find($visit->user_id)->device_token;
        if($device_token) {
            $notification = new NotificationPhone();
            $notification->notifier_id= $visit->user_id;
            $notification->request_id= $visit->id;
            $notification->is_read= 0;
            $notification->type= 'reservation_acceptance';
            $notification->message= $request->accept;
            $notification->save();
                $data = [
                    'title' => "Accept reservation time",
                    'message' =>  $request->accept,
                    'type' => "general",
                    'priority' => 'high',
                  ];
                $optionBuilder = new OptionsBuilder();
                $optionBuilder->setTimeToLive(60 * 20);
                $notificationBuilder = new PayloadNotificationBuilder($data['title']);
                $notificationBuilder->setBody($data['message'])
                    ->setSound('default');
                $notificationBuilder->setclickAction('FLUTTER_NOTIFICATION_CLICK');
                $dataBuilder = new PayloadDataBuilder();
                $dataBuilder->addData($data);
               
                $option = $optionBuilder->build();
                $notification = $notificationBuilder->build();
                $data = $dataBuilder->build();
                $downstreamResponse = FCM::sendTo($device_token, $option, $notification, $data);
                $downstreamResponse->numberSuccess();
                $downstreamResponse->numberFailure();
                $downstreamResponse->numberModification();
                $downstreamResponse->tokensToDelete();
                $downstreamResponse->tokensToModify();
                $downstreamResponse->tokensToRetry();
                $downstreamResponse->tokensWithError();
            }
        return redirect()->route('reservations')
        ->with(['success' => trans('Reservation accepted and notification send successfully')]);
    }

    public function showResult ($id){
        $result = Result::where('visit_id',$id)->first();
        return view('dashboard.visits.result_show',compact('result'));
    }

    public function reservationAccept ($id){
        $visit = Visit::where('id',$id)->first();
        return view('dashboard.visits.result_accept',compact('visit'));
    }
}

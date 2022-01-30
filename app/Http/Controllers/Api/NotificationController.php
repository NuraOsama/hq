<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotificationPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function UserNotifications(Request $request)
    {
        $user_id = Auth()->user()->id;
        $notifications = NotificationPhone::where('notifier_id',$user_id)->get();
        if(count($notifications)>0){
            $data = [];
            foreach($notifications as $notification){
                $arr['id'] = $notification->id;
                $arr['type'] = $notification->type;
                $arr['message'] = $notification->message;
                $arr['request_id'] = $notification->request_id;
                $arr['is_read'] = $notification->is_read;
                $arr['notifier_id '] = $notification->notifier_id;
                $data[] = $arr;
            }
            return response([
                'status' =>true ,
                'message' =>trans("api.notification")  ,
                'data' =>$data
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans("api.not_notification")  ,
                'data' =>[]
            ]);
        }
    }

    public function DeleteNotification(Request $request){
        $notificationPhone = NotificationPhone::find($request->notification_id);
        if($notificationPhone){
            $notificationPhone->delete();
            return response([
                'status' =>true ,
                'message' =>trans("api.NotificationDeleted")  ,
                'data' =>[]
            ]);
        }else{
            return response([
                'status' =>false ,
                'message' =>trans("api.notification_not_valid")  ,
                'data' =>[]
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Response\APIResponse;
use App\Models\Notification;
use Symfony\Component\HttpFoundation\Response as ResponseHTTP;

class NotificationController extends Controller
{

    /**
     * Define the API response
     */
    public function __construct()
    {
        $this->APIResponse = new APIResponse();
    }

    /**
     * return the belonging Notification list
     */
    public function index()
    {

        try {
              $notifications = Notification::where(['user_id'=>auth('api')->user()->id])->orderBy('id', 'DESC')->paginate(config('constants.API.DEFAULT_PAGE'));

              $result['notification_list'] = [];

              $i = 0;
              
              foreach ($notifications as $key => $notification) {
               
                $result['notification_list'][$i]['image'] = 'https://picsum.photos/200/300';
                $result['notification_list'][$i]['notification_title'] = isset($notification->notification_text)?$notification->notification_text:'';
                $result['notification_list'][$i]['timestamp'] = isset($notification->created_at)?$notification->created_at->timestamp:'';
                $result['notification_list'][$i]['is_read'] = $notification->read_notification;
               
                $i++;
              }
              return $this->APIResponse->respondWithMessageAndPayload($result);

        } catch (\Exception $e) {
            return $this->APIResponse->handleAndResponseException($e);
        }
    }



    
}

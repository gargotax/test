<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeMessage(Request $request){
        $message=Message::create([
            "body"=>"hachemi",
            "user_id"=> "01",
        ]);
        return $message;
    }

    public function getMessage(Request $request){
        $messages = Message::query()
            ->limit($request->input('limit'))
            ->offset($request->input('offset'))
            ->get();

        return $messages;
    }

    public function deleteMessage(Request $request, int $message_id){
        return Message::where ('id', $message_id)->delete();



    }

    public function updateMessage(Request $request){

         $data= $request->all();

        foreach ($data as $datum) {
                       Message::where('id', $datum['message_id'])
                           ->update([
                               'city' => $datum['city'],
                               'body' => $datum['body']
                           ]);


        }

        //
    }


}

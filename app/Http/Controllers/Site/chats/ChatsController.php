<?php

namespace App\Http\Controllers\site\chats;

use App\Events\ChatMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\profile\salon\SalonImagesResource;
use App\Http\Resources\profile\user\UserGeneralSettingsResource;
use App\Model\Message;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\HomeBackground;
use PhpParser\Node\Expr\Array_;

class ChatsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('site.chats.index',compact('user'));
    }

    public function getOldChats($id)
    {
        $user = auth()->user();
        $messagesByMe = Message::where('sender_id',$user->id )->get();
        $messagesWithMe = Message::where('receiver_id',$user->id )->get();
        $chatsByMe =  $messagesByMe->unique('receiver_id')->values()->pluck('receiver_id')->toArray();
        $chatsWithMe =  $messagesWithMe->unique('sender_id')->values()->pluck('sender_id')->toArray();
        $catArray = array_unique(array_merge($chatsByMe,$chatsWithMe));
        $users_to_chat = User::whereIn('id',$catArray)->select('id','name','salon_name','user_image','salon_image')->get();

//        $usersToChat =  UserGeneralSettingsResource::collection($usersToChat);

        return $users_to_chat;
    }

    public function fetchMessages()
    {
        $senderID = auth()->user()->id;
        $receiverID = request('receiverID');
        $message = Message::where(function ($q) use ($senderID, $receiverID) {
            $q->where('sender_id', $senderID)->where('receiver_id', $receiverID);
        })->orwhere(function ($q) use ($senderID, $receiverID) {
            $q-> where('sender_id', $receiverID)->where('receiver_id', $senderID);
        })->orderBy('messages.id', 'desc')->take(20)->with('user')->get();
//        $message = $message->reverse();
        $message = array_reverse($message->toArray());

//        $scores = $message->reverse();
        return $message;
    }

    public function messageReceiverData(Request $request)
    {
         $data = $request->validate([
            'receiverID' => 'required|integer',
        ]);
        $receiver = User::findOrFail($data['receiverID']);
        return new UserGeneralSettingsResource($receiver);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string',
            'receiverID' => 'required|integer',
        ]);
        $data['sender_id'] = auth()->user()->id;
        $data['receiver_id'] = $request->receiverID;
        $message =  Message::create($data);
        broadcast(new ChatMessages($message->load('user'),$data['receiver_id']))->toOthers();
//        broadcast(new ChatMessages($message->load('user'),$data['receiver_id']));
//        ChatMessages::dispatch($message->load('user'),$data['receiver_id']);

        return ['status' => 'Message Sent!'];
    }
}

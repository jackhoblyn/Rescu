<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contact;

class ChatController extends Controller
{
    public function index()
    {
    	// $ads = Ad::all(); //Showall projects
        $contacts = auth()->user()->contacts()->get(); //show ads by a certain user,
    	return view('chat.index', compact('contacts'));
    }

    public function storeContact(Request $request)
    {
    	$userId = auth()->user()->id; 

    	$contact = Contact::create([
            'user_id' => $userId,
            'vendor_id' => $request->vendor_id
        ]);
    }

    public function show(Contact $contact)
    {
        return view('chat.show', compact('contact'));
    }

    public function getChat($id) {
        $chats = Chat::where(function ($query) use ($id) {
            $query->where('user_id', '=', Auth::user()->id)->where('vendor_id', '=', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', '=', $id)->where('vendor_id', '=', Auth('vendor')->user()->id);
        })->get();

        //get the chats where the user_id is auth and vendor_id is is the one passed or where the user_id is the one passed and the vendor_id is the authed one

        //Make new query because this one sucks



        return $chats;
    }

    public function sendChat(Request $request) {
        Chat::create([
            'user_id' => $request->user_id,
            'vendor_id' => $request->friend_id,
            'chat' => $request->chat
        ]);
        
        return [];
    }



}

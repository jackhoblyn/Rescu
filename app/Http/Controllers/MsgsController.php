<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convo;
use App\Msg;
use App\Vendor;
use App\User;
use Auth;

class MsgsController extends Controller
{
    public function store(Vendor $vendor)
    {
    	$userId = Auth::user()->id;

    	$convo = Convo::create([
        	'user_id' => $userId,
            'topic' => request('topic'),
            'vendor_id' => $vendor->id
        ]);

        $msg = Msg::create([
        	'user_id' => $userId,
            'body' => request('body'),
            'vendor_id' => $vendor->id,
            'convo_id' => $convo->id,
            'sender' => request('sender'),
            'read' => request('read')
        ]);

        return redirect()->route('messages.show', ['convo' => $convo->id]);
    }

    public function send(Vendor $vendor)
    {
        if (\DB::table('convos')->where('vendor_id', $vendor->id)->exists())
        {
            $convo = \DB::table('convos')->where('vendor_id', $vendor->id)->first();
            return redirect()->route('messages.show', ['convo' => $convo->id]);
        }
        else
        {
            return view('messenger.send', compact('vendor'));
        }
        
    }

    public function vsend(User $user)
    {
        dd('hi');
        
    }

    public function reply(Convo $convo)
    {
        $msg = Msg::create([
            'user_id' => $convo->user_id,
            'body' => request('body'),
            'vendor_id' => $convo->vendor_id,
            'convo_id' => $convo->id,
            'sender' => request('sender'),
            'read' => request('read')
        ]);

        return redirect($convo->path());
    }

    public function vreply(Convo $convo)
    {
        $msg = Msg::create([
            'user_id' => $convo->user_id,
            'body' => request('body'),
            'vendor_id' => $convo->vendor_id,
            'convo_id' => $convo->id,
            'sender' => request('sender'),
            'read' => request('read')
        ]);


        return redirect($convo->list());
    }

    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Msg;
use App\Convo;
use Auth;

class ConvoController extends Controller
{
     public function index()
    {
    	// $ads = Ad::all(); //Showall projects
        $convos = auth()->user()->convos()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
    	return view('messenger.index', compact('convos'));
    }

    public function all()
    {
        $convos = auth('vendor')->user()->convos()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
        return view('messenger.all', compact('convos'));
    }

    public function show(Convo $convo)
    {

        return view('messenger.show', compact('convo'));
    }

    public function list(Convo $convo)
    {
         return view('messenger.list', compact('convo'));
    }
}

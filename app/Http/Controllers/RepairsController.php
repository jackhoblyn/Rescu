<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;

class RepairsController extends Controller
{
    public function show(Repair $repair)

    {

         return view('repairs.show', compact('repair'));
    }

    public function index()

    {
    	// $ads = Ad::all(); //Showall projects
        $repairs = auth()->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
    	return view('repairs.index', compact('repairs'));
    }
}

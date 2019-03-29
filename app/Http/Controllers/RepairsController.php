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

    public function list(Repair $repair)

    {

         return view('repairs.list', compact('repair'));
    }

     public function full(Repair $repair)

    {

         return view('repairs.full', compact('repair'));
    }

    public function fullAd(Repair $repair)

    {

         return view('repairs.fullAd', compact('repair'));
    }

    public function index()

    {
    	// $ads = Ad::all(); //Showall projects
        $repairs = auth()->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
    	return view('repairs.index', compact('repairs'));
    }

    public function all()

    {
        // $ads = Ad::all(); //Showall projects
        $repairs = auth('vendor')->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
        return view('repairs.all', compact('repairs'));
    }
}

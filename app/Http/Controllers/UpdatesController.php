<?php

namespace App\Http\Controllers;
use App\Repair;
use App\Update;

use Illuminate\Http\Request;

class UpdatesController extends Controller
{
    public function store(Repair $repair)
    {
        Update::create([
            'description' => request('description'),
            'progress' => request('progress'),
            'repair_id' => $repair->id
        ]);

        $repair->progress = request('progress');
        $repair->save();

        return back();
    }
}

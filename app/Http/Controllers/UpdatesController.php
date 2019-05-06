<?php

namespace App\Http\Controllers;
use App\Repair;
use App\Update;
use App\User;
use App\Vendor;
use App\Notifications\UpdatePosted;

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

        $user = User::find($repair->user_id);
        $vendor = Vendor::find($repair->vendor_id);

        $user->notify(new UpdatePosted($repair, $vendor));

        return back();
    }
}

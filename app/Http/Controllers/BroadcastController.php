<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SimpleMessage;

class BroadcastController extends Controller
{
    public function index(){
        return view('broadcast');
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        
        SimpleMessage::dispatch($request->input('name'));
        return 'sent';
        
    }


}

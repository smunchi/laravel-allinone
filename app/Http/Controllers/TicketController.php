<?php

namespace App\Http\Controllers;

use App\Jobs\CreateTicket;
use App\Http\Requests\CreateTicketRequest;

class TicketController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(CreateTicketRequest $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CreateTicket::dispatch($data, Auth()->user()->id)->onQueue('user_'.Auth()->user()->id);

        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }
}

<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();

        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\CreateTicket;
use App\Http\Requests\CreateTicketRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        DB::transaction();

        try {
            Log::info('Calling CreateTicket job');
            CreateTicket::dispatch($data, Auth()->user()->id)->onQueue('user_'.Auth()->user()->id);
            DB::commit();
        } catch (\Exception $exception) {
            Log::error('Line: ' . $exception->getLine() . ' File: ' . $exception->getFile() . ' Error: ' . $exception->getMessage());

            DB::rollBack();
        }

        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }
}

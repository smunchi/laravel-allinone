<?php

namespace App\Jobs;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    private $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $userId)
    {
        $this->request = $request;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = new Ticket();
        $ticket->user_id = $this->userId;
        $ticket->title = $this->request['title'];
        $ticket->description = $this->request['description'];
        $ticket->save();
    }
}

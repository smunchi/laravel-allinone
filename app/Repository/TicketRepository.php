<?php

namespace App\Repository;

use App\Ticket;

class TicketRepository extends Repository
{
    public function model()
    {
        return Ticket::class;
    }
}

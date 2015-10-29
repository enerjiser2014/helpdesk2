<?php

namespace App\Models;


class Ticket
    extends Model
{
    public function getTable()
    {
        return 'Tickets';
    }

    public function getIdName()
    {
        return 'id_ticket';
    }

    public function getAllTickets()
    {
        return $this->getAllRecords();
    }

    public function getTicketById($id) {
        return $this->getRecordById($id);
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function bookTicket()
    {
        return view('backend.customer.book-ticket');
    }
}

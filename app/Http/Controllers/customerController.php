<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function display(Customer $customer){
        return view('customer',[
            'title' => 'Customer Display',
            'customer' => $customer
        ]);
    }
}

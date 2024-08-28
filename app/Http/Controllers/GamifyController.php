<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class GamifyController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('gamifies.index', compact('customers'));
    }
//
}

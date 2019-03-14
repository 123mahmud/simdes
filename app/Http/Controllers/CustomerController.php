<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function historitransaksi()
    {
    	return view('customer/historitransaksi/historitransaksi');
    }
}

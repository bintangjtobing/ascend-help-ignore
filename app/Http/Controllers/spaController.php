<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company_details;

class spaController extends Controller
{
    public function index()
    {
        $company = company_details::first();
        return view('layout', ['company' => $company]);
    }
}

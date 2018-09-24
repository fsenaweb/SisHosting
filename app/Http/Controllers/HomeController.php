<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Invoice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $page = ['name' => 'Dashboard', 'link' => 'dash'];
        $this->page = $page;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = $this->page;
        $client = Client::orderBy('id', 'DESC')->limit(5)->get();
        $domain = Domain::all();
        $sum = Invoice::where('pay', 1)
            ->whereMonth('date_pay', date('m'))
            ->sum('amount');
        return view('home', compact('page', 'sum', 'domain', 'client'));
    }
}

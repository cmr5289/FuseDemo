<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$companies = \App\Company::all();
        $companies = DB::table('companies')->get();
        $contacts = DB::table('contacts')->get();
        foreach ($contacts as $value) {
            $value->company = DB::table('companies')->where('id', $value->company_id)->first();
        }

        return view('welcome', ['companies' => $companies, 'contacts' => $contacts]);
        //return view('home');
    }
}

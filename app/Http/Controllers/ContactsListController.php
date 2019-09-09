<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsListController extends Controller
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
        $contacts = DB::table('contacts')->get();
        foreach ($contacts as $value) {
            $value->company = DB::table('companies')->where('id', $value->company_id)->first();
        }

        return view('contacts', ['contacts' => $contacts]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
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
    public function index($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();

        if(!$contact){
            abort(404);
        }
        
        $contact->company = DB::table('companies')->where('id', $contact->company_id)->first();

        return view('contact', ['contact' => $contact, 'id' => $id]);
    }
}

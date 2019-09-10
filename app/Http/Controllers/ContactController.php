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
    public function index()
    {
        return contact::all();
    }

    public function get(contact $contact)
    {
        return $contact;
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:contacts|max:255',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'company_id' => 'integer',
        ]);

        $contact = contact::create($request->all());
 
        return response()->json($product, 201);
    }
 
    public function put(Request $request, contact $contact)
    {
        $contact->update($request->all());
 
        return response()->json($contact, 200);
    }
 
    public function delete(contact $contact)
    {
        $contact->delete();
 
        return response()->json(null, 204);
    }
}

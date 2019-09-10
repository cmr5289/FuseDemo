<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;

class CompanyController extends Controller
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
        //return DB::table('companies')->get();
        return Company::all();
    }

    public function get(Company $company)
    {
        return $company;
    }

    public function post(Request $request)
    {
        $company = Company::create($request->all());
 
        return response()->json($product, 201);
    }
 
    public function put(Request $request, Company $company)
    {
        $company->update($request->all());
 
        return response()->json($company, 200);
    }
 
    public function delete(Company $company)
    {
        $company->delete();
 
        return response()->json(null, 204);
    }
}

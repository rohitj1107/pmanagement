<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
          $companies = Company::where('user_id',Auth::user()->id)->get();
          // $companies = Company::All();
          return view('companies.index',['companies'=>$companies]);
        }
        return view('auth.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $company = company::create([
          'name' => $request->input('name'),
          'description' => $request->input('description'),
          'user_id' => Auth::user()->id
        ]);

        if ($company) {
            return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company Create successfully!');
        }
        return back()->withInput()->with('errors','Error create new comapny');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
        $result = Company::find($company->id);
        // var_dump($result);
        return view('companies.show',['result'=>$result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
        $result = Company::find($company->id);
        return view('companies.edit',['result'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //

        $companyUpdate = Company::where('id',$company->id)->update([
          'name'=>$request->input('name'),
          'description'=>$request->input('description')
        ]);

        if ($companyUpdate) {
           return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company Update Successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
        $findCompany = Company::find( $company->id);
        if($findCompany->delete()){
        	return redirect()->route('companies.index')->with('success','company deleted succesfully');
        }

        return back()->withInput()->with('error','Company could not be deleted');
    }
}

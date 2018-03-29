<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies/index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = "";
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/logos/', $name);
        }
        $company = new Company();
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->logo = $name;
        $company->website = $request->get('website');
        $company->save();

        return redirect('companies')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies/edit', compact('company', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->logo = $request->get('logo');
        $company->website = $request->get('website');
        $company->save();

        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('companies')->with('success', 'Information has been deleted');
    }
}

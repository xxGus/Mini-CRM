<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $companies = Company::all();
            return view('companies/index', compact('companies'));
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('companies/create');
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompany $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $company = new Company();
        $name = "";

        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $file->move(storage_path('app/public/logos'), $name);
        }
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
        if (Auth::check()) {
            $company = Company::find($id);
            return view('companies/edit', compact('company', 'id'));
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCompany $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, $id)
    {
        $company = Company::find($id);
        $company->fill($request->except('logo'));

        $validated = $request->validated();

        if ($file = $request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/logos/', $name);
            $company->logo = $name;
        }

        $company->name = $request->get('name');
        $company->email = $request->get('email');
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

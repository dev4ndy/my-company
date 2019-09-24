<?php

namespace App\Http\Controllers\Company;

use App\Events\CompanyAdded;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use App\Models\Company;
use File;
use Illuminate\Http\Request;
use Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $companies = Company::latest()->paginate($perPage);
        return view('company.index', compact('companies', $companies));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreCompany  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        // if validated fails, return the validations errors
        $request->validated();
        $logoName = $this->storageLogo($request);
        //Set and save entity company
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $logoName;
        $company->save();
        event(new CompanyAdded($company));
        return redirect()->route('company.index')->with('success.company', 'The company has been create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateCompany  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        $oldLogo = $request->old_logo ?? null;
        $logoName = $this->storageLogo($request, $company, $oldLogo);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $logoName ?? $oldLogo;
        $company->save();
        return redirect()->route('company.index')->with('success.company', 'The company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->delete()) {
            return redirect()->route('company.index')->with('success.company', 'The company has been delete');
        }
    }

    /**
     * Helpers
     */

    /**
     * Save logo in the public folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return String
     */
    public function storageLogo(Request $request, $oldComapany = null, $oldLogo = null)
    {
        $logoName = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            if ($oldComapany != null) {
                Storage::disk('public')->delete($oldComapany->logo);
            }
            $logoName = uniqid('logo_') . '.' . $logo->getClientOriginalExtension();
            Storage::disk('public')->put($logoName, File::get($logo));
        }

        if ($oldLogo == null && $oldComapany != null) {
            Storage::disk('public')->delete($oldComapany->logo);
        }

        return $logoName;
    }
}

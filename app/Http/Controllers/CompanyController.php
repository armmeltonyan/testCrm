<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use App\Services\FileUploadService;
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
        $companies = Company::paginate(10);

        return view('company.index',compact('companies'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request, FileUploadService $fileUploadService)
    {

        if ($request->hasFile('logo'))
        {
            $logo = $fileUploadService->upload($request->file('logo'));
        }

        Company::create(array_merge($request->validated(), ['logo' => $logo ?? null]));

        return redirect()->to('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyStoreRequest $request, $id,FileUploadService $fileUploadService)
    {

        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->web_site = $request->web_site;
        if ($request->hasFile('logo'))
        {
            $logo = $fileUploadService->upload($request->file('logo'));
            $company->logo = $logo;
        }
        $company->save();

        return redirect()->to('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::whereId($id)->delete();

        return redirect()->to('/companies');
    }
}

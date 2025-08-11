<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::where('user_id', Auth::id())->get();

        if ($companies->isEmpty()) {
            $this->errorResponse( 'No companies found for the user.', 404);
        }

        return CompanyResource::collection($companies);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'address' => $request->address,
            'industry' => $request->industry,
            'user_id' => Auth::id(),
        ]);

        if (!$company) {
            return $this->errorResponse('Failed to create company.', 500);
        }

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        if ($company->user_id !== Auth::id()) {
            return $this->errorResponse('Unauthorized access to this company.', 403);
        }

        return new CompanyResource($company->load('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        dd('Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        dd('Company deleted successfully.');
    }
}
